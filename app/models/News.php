<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Quynhtm
 */
class News extends Eloquent
{
    protected $table = 'web_news';
    protected $primaryKey = 'news_id';
    public $timestamps = false;

    //cac truong trong DB
    protected $fillable = array('news_id','news_title', 'news_desc_sort',
        'news_content', 'news_image', 'news_image_other',
        'news_create','news_user_create','news_update','news_user_update',
        'meta_title', 'meta_keywords', 'meta_description',
        'news_type', 'news_category', 'news_status');

    public static function getNewByID($id) {
        $new = (Memcache::CACHE_ON)? Cache::get(Memcache::CACHE_NEW_ID.$id) : array();
        if (sizeof($new) == 0) {
            $new = News::where('news_id', $id)->first();
            if($new && Memcache::CACHE_ON){
                Cache::put(Memcache::CACHE_NEW_ID.$id, $new, Memcache::CACHE_TIME_TO_LIVE_ONE_MONTH);
            }
        }
        return $new;
    }

    public static function searchByCondition($dataSearch = array(), $limit =0, $offset=0, &$total){
        try{
            $query = News::where('news_id','>',0);
            if (isset($dataSearch['news_title']) && $dataSearch['news_title'] != '') {
                $query->where('news_title','LIKE', '%' . $dataSearch['news_title'] . '%');
            }
            if (isset($dataSearch['news_status']) && $dataSearch['news_status'] != -1) {
                $query->where('news_status', $dataSearch['news_status']);
            }
            if (isset($dataSearch['news_category']) && $dataSearch['news_category'] > 0) {
                $query->where('news_category', $dataSearch['news_category']);
            }
            if (isset($dataSearch['news_type']) && $dataSearch['news_type'] > 0) {
                $query->where('news_type', $dataSearch['news_type']);
            }
            if (isset($dataSearch['not_news_id']) && $dataSearch['not_news_id'] > 0) {
                $query->where('news_id','<>', $dataSearch['not_news_id']);
            }
            $total = $query->count();
            $query->orderBy('news_id', 'desc');

            //get field can lay du lieu
            $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',',trim($dataSearch['field_get'])): array();
            if(!empty($fields)){
                $result = $query->take($limit)->skip($offset)->get($fields);
            }else{
                $result = $query->take($limit)->skip($offset)->get();
            }
            return $result;

        }catch (PDOException $e){
            throw new PDOException();
        }
    }

    /**
     * @desc: Tao Data.
     * @param $data
     * @return bool
     * @throws PDOException
     */
    public static function addData($dataInput)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            $dataSave = new News();
            if (is_array($dataInput) && count($dataInput) > 0) {
                foreach ($dataInput as $k => $v) {
                    $dataSave->$k = $v;
                }
            }
            if ($dataSave->save()) {
                DB::connection()->getPdo()->commit();
                if(isset($dataSave->news_id) && $dataSave->news_id > 0){
                    self::removeCache($dataSave->news_id);
                }
                return $dataSave->news_id;
            }
            DB::connection()->getPdo()->commit();
            return false;
        } catch (PDOException $e) {
            return $e->getMessage();
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    /**
     * @desc: Update du lieu
     * @param $id
     * @param $data
     * @return bool
     * @throws PDOException
     */
    public static  function updateData($id, $dataInput)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            $dataSave = News::find($id);
            if (!empty($dataInput)){
                $dataSave->update($dataInput);
                if(isset($dataSave->news_id) && $dataSave->news_id > 0){
                    self::removeCache($dataSave->news_id);
                }
            }
            DB::connection()->getPdo()->commit();
            return $dataSave->news_id;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    /**
     * @desc: Update Data.
     * @param $id
     * @param $status
     * @return bool
     * @throws PDOException
     */
    public static function deleteData($id){
        try {
            DB::connection()->getPdo()->beginTransaction();
            $dataSave = News::find($id);
            $dataSave->delete();
            if(isset($dataSave->news_id) && $dataSave->news_id > 0){
                $arrImagOther = unserialize($dataSave->news_image_other);
                if(!empty($arrImagOther)){
                    foreach($arrImagOther as $k=>$v){
                        unset($arrImagOther[$k]);
                        //xoa anh upload
                        FunctionLib::deleteFileUpload($v,$id,CGlobal::FOLDER_NEWS);
                        //x�a anh thumb
                        $arrSizeThumb = CGlobal::$arrSizeImage;
                        foreach($arrSizeThumb as $k=>$size){
                            $sizeThumb = $size['w'].'x'.$size['h'];
                            FunctionLib::deleteFileThumb($v,$id,CGlobal::FOLDER_NEWS,$sizeThumb);
                        }
                    }
                }
                self::removeCache($dataSave->news_id);
            }
            DB::connection()->getPdo()->commit();
            return true;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    public static function removeCache($id = 0){
        if($id > 0){
            Cache::forget(Memcache::CACHE_NEW_ID.$id);
        }
    }
    //get news same
    public static function getSameNews($dataField='', $catid=0, $id=0, $limit=10){
        try{
            $result = array();

            if($catid>0 && $id>0 && $limit>0){
                $query = News::where('news_id','<>', $id);
                $query->where('news_category', $catid);
                $query->where('news_status', CGlobal::status_show);
                $query->orderBy('news_id', 'desc');

                $fields = (isset($dataField['field_get']) && trim($dataField['field_get']) != '') ? explode(',',trim($dataField['field_get'])): array();
                if(!empty($fields)){
                    $result = $query->take($limit)->get($fields);
                }else{
                    $result = $query->take($limit)->get();
                }
            }
            return $result;

        }catch (PDOException $e){
            throw new PDOException();
        }
    }
}