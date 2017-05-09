<?php

/**
 * Created by PhpStorm.
 * User: QuynhTM
 */
class CronjobsController extends BaseSiteController
{
    private  $sizeImageShowUpload = CGlobal::sizeImage_100;
	//cronjobs/runJobs?action=0
    function runJobs() {
        $action = Request::get('action', 0);//kiểu chạy joib
        switch( $action ){
            case 1://cập nhật link ảnh trong sản phẩm
            case 2://cập nhật link ảnh trong sản phẩm
            case 4://replace /r/n
                $this->updateLinkInContent($action);
                break;
			case 3://cập nhật email NCC
                $this->convertEmailProvider();
                break;
            default:
                break;
        }
        echo 'Bạn chưa chọn kiểu action';
    }

    public function updateLinkInContent($type = 0){
    	$total = 0;
    	switch( $type ){
        		case 1://cập nhật link ảnh trong sản phẩm
        			$dataSearch['field_get'] = 'item_id,item_content';
        			$data = Items::searchByCondition($dataSearch,500,0,$total);
        			if($data){
        				foreach($data as $k=>$product){
        					$content = stripcslashes($product->item_content);

        					$url_old = '600x600';
        					$content = str_replace($url_old, '500x300',$content);

        					$dataUpdate['item_content'] = $content;
        					Items::updateData($product->item_id,$dataUpdate);
        				}
        			}
        			break;
        		case 2://cập nhật link ảnh trong tin tức
        				$dataSearch['field_get'] = 'news_id,news_content';
        				$data = News::searchByCondition($dataSearch,1000,0,$total);
        				
        				if($data){
        					foreach($data as $k=>$product){
        						$content = stripcslashes($product->news_content);
        						 
        						$url_old1 = 'http://www.shopcuatui.com.vn/image.php?type_dir=news&amp;id='.$product->news_id.'&amp;width=700&amp;height=700&amp;image=';
        						$content1 = str_replace($url_old1, '',$content);
        						 
        						$url_old2 = 'http://shopcuatui.com.vn/image.php?type_dir=news&amp;id='.$product->news_id.'&amp;width=700&amp;height=700&amp;image=';
        						$content2 = str_replace($url_old2, '',$content1);
        						$dataUpdate['news_content'] = $content2;
        						 
        						News::updateData($product->news_id,$dataUpdate);
        					}
        				}
        				break;
                case 4://replace /r/n
                    $dataSearch['field_get'] = 'product_id,product_sort_desc,product_content';
                    $data = Product::searchByCondition($dataSearch,500,0,$total);
                    if($data){
                        foreach($data as $k=>$product){

                            $intro = stripcslashes($product->product_sort_desc);
                            $intro = str_replace('\r', '',$intro);
                            $intro = str_replace('\n', '',$intro);
                            $intro = str_replace('\\', '',$intro);

                            $content = stripcslashes($product->product_content);
                            $content = str_replace('\r', '',$content);
                            $content = str_replace('\n', '',$content);
                            $content = str_replace('\\', '',$content);

                            $dataUpdate['product_sort_desc'] = $intro;
                            $dataUpdate['product_content'] = $content;
                            Product::updateData($product->product_id, $dataUpdate);
                        }
                    }
                    break;
        		default:
        			break;
        	}
            echo 'đã cập nhật xong';
        }

	public function convertEmailProvider(){
		die('dã chạy thêm dữ liệu');
		$total = 0;
		$dataSearch['field_get'] = 'provider_id,provider_name,provider_phone,provider_email';
		$dataProvider = ProviderEmail::searchByCondition($dataSearch,1000,0,$total);
		$total_insert = 0;
		if($dataProvider){
			foreach($dataProvider as $k=>$valu){
				if($valu->provider_email != ''){
					$insert = array('supplier_created'=>time(),
						'supplier_name'=>$valu->provider_name,
						'supplier_phone'=>$valu->provider_phone,
						'supplier_email'=>trim(str_replace(' ','',$valu->provider_email)));
					Supplier::addData($insert);
					$total_insert ++;
				}
			}
		}
		echo 'Tong ban dau: '.$total.'--- Tong them: '.$total_insert;
		//FunctionLib::debug($provider);
	}
	
	//get sản phẩm cho rao private
	//cronjobs/apiGetProductShop
	public function apiGetProductShop(){
		//$search['str_product_id'] = addslashes(Request::get('str_product_id','702,701'));
		$search['product_status'] = (int)Request::get('product_status',1);
		//$search['user_shop_id'] = Request::get('user_shop_id',array(55));
		$search['field_get'] = 'product_id,product_name,product_price_sell,product_type_price,product_content,product_image,product_image_other,product_status';//cac truong can lay
		$total = 0;
		$dataSearch = Product::searchByCondition($search, 1000, 0,$total);
		$result = array();

		if($dataSearch){
			foreach($dataSearch as $item){
				$result[$item->product_id] = array(
					'product_id'=>$item->product_id,
					'product_name'=>$item->product_name,
					'product_type_price'=>$item->product_type_price,//1:hiển thị giá số, 2: hiển thị giá liên hệ
					'product_price_sell'=>$item->product_price_sell,
					'product_content'=>$item->product_content,
					'product_image'=>$item->product_image,
					'product_image_other'=>$item->product_image_other,
					'product_status'=>$item->product_status,
					);
			}
		}
		//FunctionLib::debug($result);
		return Response::json($result);
	}

}