<?php
/*
* @Created by: DUYNX
* @Author    : nguyenduypt86@gmail.com
* @Date      : 06/2016
* @Version   : 1.0
*/

class InfoSaleController extends BaseAdminController{
	private $permission_view = 'infor_sale_view';
	private $permission_full = 'infor_sale_full';
	private $permission_delete = 'infor_sale_delete';
	private $permission_create = 'infor_sale_create';
	private $permission_edit = 'infor_sale_edit';

	private $error = '';
	public function __construct(){
		parent::__construct();
		FunctionLib::link_js(array(
			'lib/ckeditor/ckeditor.js',
		));
	}
	public function listView(){
		if(!$this->is_root && !in_array($this->permission_full,$this->permission)&& !in_array($this->permission_view,$this->permission)){
			return Redirect::route('admin.dashboard',array('error'=>1));
		}
		//Config Page
		$pageNo = (int) Request::get('page', 1);
		$pageScroll = CGlobal::num_scroll_page;
		$limit = CGlobal::number_limit_show;
		$offset = ($pageNo - 1) * $limit;
		$search = $data = array();
		$total = 0;
		
		$search['infor_sale_name'] = addslashes(Request::get('infor_sale_name', ''));
		$search['field_get'] = '';
		
		$data = InfoSale::searchByCondition($search, $limit, $offset, $total);
		$paging = $total > 0 ? Pagging::getNewPager($pageScroll, $pageNo, $total, $limit, $search) : '';
		$messages = FunctionLib::messages('messages');
		
		$this->layout->content = View::make('admin.infosale.list')
								->with('data', $data)
								->with('total', $total)
								->with('paging', $paging)
								->with('search', $search)
								->with('is_root', $this->is_root)
								->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)
								->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)
								->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)
								->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0)
								->with('messages', $messages);
	}
	public function getItem($id=0){
		if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
			return Redirect::route('admin.dashboard',array('error'=>1));
		}
		$data = array();
		if($id > 0) {
			$data = InfoSale::getById($id);
		}

		$this->layout->content = View::make('admin.infosale.add')
		->with('id', $id)
		->with('data', $data)
		->with('is_root', $this->is_root)
		->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)
		->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)
		->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)
		->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0)
		->with('error', $this->error);
	}
	public function postItem($id=0){
		if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_edit,$this->permission) && !in_array($this->permission_create,$this->permission)){
			return Redirect::route('admin.dashboard',array('error'=>1));
		}
		$id_hiden = (int)Request::get('id_hiden', 0);
		$data = array();
		
		$dataSave = array(
				'infor_sale_name'=>array('value'=>addslashes(Request::get('infor_sale_name')), 'require'=>1, 'messages'=>'Tiêu đề không được trống!'),
				'infor_sale_phone'=>array('value'=>addslashes(Request::get('infor_sale_phone')),'require'=>1, 'messages'=>'SĐT không được trống!'),
				'infor_sale_mail'=>array('value'=>addslashes(Request::get('infor_sale_mail')),'require'=>0),
				'infor_sale_skype'=>array('value'=>addslashes(Request::get('infor_sale_skype')),'require'=>0),
				'infor_sale_address'=>array('value'=>(int)addslashes(Request::get('infor_sale_address')),'require'=>0),
				'infor_sale_uid'=>array('value'=>addslashes(Request::get('infor_sale_uid')),'require'=>1, 'messages'=>'UID gán không được trống!'),
				'infor_sale_sotaikhoan'=>array('value'=>addslashes(Request::get('infor_sale_sotaikhoan')),'require'=>0),
				'infor_sale_vanchuyen'=>array('value'=>addslashes(Request::get('infor_sale_vanchuyen')),'require'=>0),
		);

		$this->error = ValidForm::validInputData($dataSave);
		if($this->error == ''){
			$id = ($id == 0) ? $id_hiden : $id;
			InfoSale::saveData($id, $dataSave);
			return Redirect::route('admin.infosale');
		}else{
			foreach($dataSave as $key=>$val){
				$data[$key] = $val['value'];
			}
		}

		$this->layout->content = View::make('admin.info.add')
		->with('id', $id)
		->with('data', $data)
		->with('is_root', $this->is_root)
		->with('permission_full', in_array($this->permission_full, $this->permission) ? 1 : 0)
		->with('permission_create', in_array($this->permission_create, $this->permission) ? 1 : 0)
		->with('permission_delete', in_array($this->permission_delete, $this->permission) ? 1 : 0)
		->with('permission_edit', in_array($this->permission_edit, $this->permission) ? 1 : 0)
		->with('error', $this->error);
	}
	public function deleteInforSale(){
		$data = array('isIntOk' => 0);
		if(!$this->is_root && !in_array($this->permission_full,$this->permission) && !in_array($this->permission_delete,$this->permission)){
			return Response::json($data);
		}
		$id = (int)Request::get('id', 0);
		if ($id > 0 && InfoSale::deleteId($id)) {
			$data['isIntOk'] = 1;
		}
		return Response::json($data);
	}
}