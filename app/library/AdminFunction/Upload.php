<?php

class Upload{

	public static function uploadImage($id, $objFile, $folder='files') {
		try {
			//Upload to server local;
			if($objFile['filedata'] != '' ) {
				$fileType = strrchr(basename($objFile['filedata']), '.');
				if(in_array(strtolower($fileType), array('.jpg', '.png', '.gif'))) {
					return json_encode(array('status'=>0, 'filename'=>$objFile['filename'], 'message'=>'File bạn upload lên không đúng định dạng file ảnh')) ;
				}

				if($folder!=''){
					$upload_dir = Config::get('config.DIR_ROOT').'uploads/'.$folder.'/';
				}else{
					$upload_dir = Config::get('config.DIR_ROOT').'uploads/';
				}

				if(!is_dir($upload_dir)){
					@mkdir($upload_dir,0777,true);
					chmod($upload_dir,0777);
				}

				$rand = rand(11111, 99999);
				if (move_uploaded_file($objFile['filedata'], $upload_dir . md5($id.$folder.$rand).strrchr(basename($objFile['filename']), '.'))) {
					return json_encode(array('status'=>1, 'filename'=>md5($id.$folder.$rand).strrchr(basename($objFile['filename']), '.'), 'message'=>'Upload thành công')) ;
				}
				return json_encode(array('status'=>-1, 'message'=>'Upload ảnh không thành công')) ;
			}

		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
	
	public static function uploadFile($_name='', $_file_ext='', $_max_file_size='50*1024*1024', $_folder=''){

		if($_file_ext != ''){
			$_file_ext = explode(',', $_file_ext);
		}else{
			$_file_ext=array("jpg","jpeg","png","gif");
		}
		
		if($_name!='' && isset($_FILES[$_name]) && count($_FILES[$_name])>0){
			if($_max_file_size){
				$max_file_size = $_max_file_size;
			}else{
				$max_file_size = 5 * 1024 * 1024;
			}
			$file_name = strtolower($_FILES[$_name]['name']);
			$file_tmp= $_FILES[$_name]["tmp_name"];
			$file_size = $_FILES[$_name]['size'];
			$file_ext = @end(explode('.',$file_name));
			$ext=0;
			$name = time().'-'.self::preg_replace_string_upload($file_name);
			$link = $name ? $name : '';
			
			if(!in_array($file_ext, $_file_ext)){
				$ext = 0;
			}else{
				$ext = 1;
			}
			
			if($file_name!='' && $ext==1 && $file_size <= $max_file_size){
				if($_folder!=''){
				 	$folder_upload = Config::get('config.DIR_ROOT').'uploads/'.$_folder;
				}else{
				 	$folder_upload = Config::get('config.DIR_ROOT').'uploads/';
				}

				if(!is_dir($folder_upload)){
			        @mkdir($folder_upload,0777,true);
			        chmod($folder_upload,0777);
			    }
				if (move_uploaded_file($file_tmp, $folder_upload.'/'.$link)) {
					return $link;
				} else {
					return '';
				}
			}
		}
	}
	//rename file upload
	public static function preg_replace_string_upload($str=''){
		if(!$str) return '';
		if($str !=''){
            $str = str_replace(array('^', '$', '\\', '/', '(', ')', '|', '?', '+', '_', '*', '[', ']', '{', '}', ',', '%', '<', '>', '=', '"', '“', '”', '!', ':', ';', '&', '~', '#', '`', "'", '@' ), array(''), trim($str));

            $unicode = array(
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                'd'=>'đ',
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                'i'=>'í|ì|ỉ|ĩ|ị',
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
                'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'D'=>'Đ',
                'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
                'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
            foreach($unicode as $nonUnicode=>$uni){
                $str = preg_replace("/($uni)/i", $nonUnicode, $str);
            }

            $str = preg_replace("/\s+/","-",$str);
            $str = preg_replace("/\-+/","-",$str);

            return strtolower($str);
        }
	}
	//check upload and unlink img current
	public static function check_upload_file($name_input_file, $current_path_img='', $name_folder=''){
		$path_img='';
		$path_img = self::uploadFile($_name=$name_input_file, $_file_ext='jpg,jpeg,png,gif,swf', $_max_file_size=20*1024*1024, $name_folder,  $type_json=0);
		if($path_img!=''){
			if($current_path_img!=''){
				$dir = Config::get('config.WEB_ROOT').'/uploads/'.$name_folder.'/'.$current_path_img;
				if(is_file($dir)){
					unlink($dir);
				}
			}
		}
		return $path_img;
	}
	//check upload and unlink img current
	public static function check_upload_file_download($name_input_file, $current_path_img='', $name_folder=''){
		$path_img='';
		$path_img = self::uploadFile($_name=$name_input_file, $_file_ext='xls,xlsx,doc,docx,pdf,rar,zip,tar', $_max_file_size=20*1024*1024, $name_folder,  $type_json=0);
		if($path_img!=''){
			if($current_path_img!=''){
				$dir = Config::get('config.WEB_ROOT').'/uploads/'.$name_folder.'/'.$current_path_img;
				if(is_file($dir)){
					unlink($dir);
				}
			}
		}
		return $path_img;
	}
}