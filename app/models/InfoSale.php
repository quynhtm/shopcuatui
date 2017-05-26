<?php
/*
* @Created by: DUYNX
* @Author    : nguyenduypt86@gmail.com
* @Date      : 06/2016
* @Version   : 1.0
*/

class InfoSale extends Eloquent {
    
    protected $table = 'web_infor_sale';
    protected $primaryKey = 'infor_sale_id';
    public  $timestamps = false;

    protected $fillable = array(
	    		'infor_sale_id', 'infor_sale_uid', 'infor_sale_name', 'infor_sale_phone', 'infor_sale_mail',
	    		'infor_sale_skype', 'infor_sale_address', 'infor_sale_sotaikhoan', 'infor_sale_vanchuyen');
	//ADMIN
    public static function searchByCondition($dataSearch=array(), $limit=0, $offset=0, &$total){
    	try{
    	  
    		$query = InfoSale::where('infor_sale_id','>',0);
    	  
    		if (isset($dataSearch['infor_sale_name']) && $dataSearch['infor_sale_name'] != '') {
    			$query->where('infor_sale_name','LIKE', '%' . $dataSearch['infor_sale_name'] . '%');
    		}
			if (isset($dataSearch['infor_sale_phone']) && $dataSearch['infor_sale_phone'] != '') {
				$query->where('infor_sale_phone',$dataSearch['infor_sale_phone']);
			}
			if (isset($dataSearch['infor_sale_uid']) && $dataSearch['infor_sale_uid'] != '') {
				$query->where('infor_sale_uid',$dataSearch['infor_sale_uid']);
			}
    		$total = $query->count();
    		$query->orderBy('infor_sale_id', 'desc');
    
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
     
    public static function getById($id=0){
    	$result = (Memcache::CACHE_ON) ? Cache::get(Memcache::CACHE_INFO_SALE_ID.$id) : array();
    	try {
    		if(empty($result)){
    			$result = InfoSale::where('infor_sale_id', $id)->first();
    			if($result && Memcache::CACHE_ON){
    				Cache::put(Memcache::CACHE_INFO_SALE_ID.$id, $result, Memcache::CACHE_TIME_TO_LIVE_ONE_MONTH);
    			}
    		}
    	} catch (PDOException $e) {
    		throw new PDOException();
    	}
    	
    	return $result;	
    }
     
    public static function updateData($id=0, $dataInput=array()){
    	try {
    		DB::connection()->getPdo()->beginTransaction();
    		$data = InfoSale::find($id);
    		if($id > 0 && !empty($dataInput)){
    			$data->update($dataInput);
    			if(isset($data->infor_sale_id) && $data->infor_sale_id > 0){
    				self::removeCacheId($data->infor_sale_id);
    			}
    		}
    		DB::connection()->getPdo()->commit();
    		return true;
    	} catch (PDOException $e) {
    		DB::connection()->getPdo()->rollBack();
    		throw new PDOException();
    	}
    }
     
    public static function addData($dataInput=array()){
    	try {
    		DB::connection()->getPdo()->beginTransaction();
    		$data = new InfoSale();
    		if (is_array($dataInput) && count($dataInput) > 0) {
    			foreach ($dataInput as $k => $v) {
    				$data->$k = $v;
    			}
    		}
    		if ($data->save()) {
    			DB::connection()->getPdo()->commit();
    			if($data->infor_sale_id && Memcache::CACHE_ON){
    				InfoSale::removeCacheId($data->infor_sale_id);
    			}
    			return $data->infor_sale_id;
    		}
    		DB::connection()->getPdo()->commit();
    		return false;
    	} catch (PDOException $e) {
    		DB::connection()->getPdo()->rollBack();
    		throw new PDOException();
    	}
    }
    
    public static function saveData($id=0, $data=array()){
    	$data_post = array();
    	if(!empty($data)){
    		foreach($data as $key=>$val){
    			$data_post[$key] = $val['value'];
    		}
    	}
    	if($id > 0){
    		InfoSale::updateData($id, $data_post);
    	}else{
    		InfoSale::addData($data_post);
    	}
    
    }
    
    public static function deleteId($id=0){
    	try {
    		DB::connection()->getPdo()->beginTransaction();
    		$data = InfoSale::find($id);
    		if($data != null){
    			$data->delete();
    			if(isset($data->infor_sale_id) && $data->infor_sale_id > 0){
    				self::removeCacheId($data->info_id);
    			}

    			DB::connection()->getPdo()->commit();
    		}
    		return true;
    	} catch (PDOException $e) {
    		DB::connection()->getPdo()->rollBack();
    		throw new PDOException();
    	}
    }

    public static function removeCacheId($id=0){
    	if($id>0){
    		Cache::forget(Memcache::CACHE_INFO_SALE_ID.$id);
    	}
    }
	//site
}
