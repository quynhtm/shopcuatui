<?php
class SiteHomeController extends BaseSiteController{
    public function __construct(){
        parent::__construct();
        FunctionLib::site_css('lib/font-awesome/4.2.0/css/font-awesome.min.css', CGlobal::$POS_HEAD);
        //return $this->offSite();
    }

    public function index(){
    	//Meta title
    	$meta_title='';
    	$meta_keywords='';
    	$meta_description='';
    	$meta_img='';
    	$arrMeta = Info::getItemByKeyword('SITE_SEO_HOME');
    	if(!empty($arrMeta)){
    		$meta_title = $arrMeta->meta_title;
    		$meta_keywords = $arrMeta->meta_keywords;
    		$meta_description = $arrMeta->meta_description;
    		$meta_img = $arrMeta->info_img;
    		if($meta_img != ''){
    			$meta_img = ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $arrMeta->info_id, $arrMeta->info_img, 550, 0, '', true, true);
    		}
    	}
    	FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

    	$this->header();
        //Slider
        $arrSlider = FunctionLib::getBannerAdvanced(CGlobal::BANNER_TYPE_HOME_BIG, CGlobal::BANNER_PAGE_HOME, 0, 0);

        //Menu category
        $dataCategory = Category::getCategoriessAll();
        $arrCategory = $this->getTreeCategory($dataCategory);

        //danh sach chuyen mục chính
        $arrProductHome = array();
        $arrDepart = Department::getDepart();
        if(!empty($arrDepart)){
            foreach($arrDepart as $depart_id =>$name){
                $product = Product::getProductHomeByDepartId($depart_id);
                if(!empty($product)){
                    $arrProductHome[$depart_id]['depart_id'] = $depart_id;
                    $arrProductHome[$depart_id]['depart_name'] = $name;
                    $arrProductHome[$depart_id]['product'] = $product;
                }
            }
        }

        $this->layout->content = View::make('site.SiteLayouts.Home')
            ->with('userAdmin', $this->userAdmin)
            ->with('arrProductHome', $arrProductHome)
            ->with('arrCategory', $arrCategory)
            ->with('arrDepart', $arrDepart)
            ->with('arrSlider', $arrSlider);

        $this->footer();
    }

    public function searchProduct(){

        $meta_title = $meta_keywords = $meta_description = 'Tìm kiếm sản phẩm';
        $meta_img = '';
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $this->header();
        $product_name = Request::get('title-search', '');

        $dataCate = $dataSearch = $arrProvince = array();
        $paging = '';$categoryName = 'Danh sách sản phẩm ';
        $total = 0;
        if (trim($product_name) !='') {
            $pageNo = (int)Request::get('page_no', 1);
            $limit = CGlobal::number_show_40;
            $offset = ($pageNo - 1) * $limit;
            $pageScroll = CGlobal::num_scroll_page;

            $search['product_name'] = trim($product_name);
            $dataSearch = Product::getProductForSite($search, $limit, $offset, $total);
            if($total > 0){
                foreach($dataSearch as $pro){
                    if(isset($dataCate[$pro->category_id])){
                        $dataCate[$pro->category_id]['count'] = $dataCate[$pro->category_id]['count'] +1;
                    }else{
                        $dataCate[$pro->category_id]['count'] = 1;
                        $dataCate[$pro->category_id]['nameCat'] = $pro->category_name;
                        $dataCate[$pro->category_id]['depart_id'] = $pro->depart_id;
                    }
                }
            }
            $paging = $total > 0 ? Pagging::getNewPager($pageScroll, $pageNo, $total, $limit, $search) : '';
        }
        $this->layout->content = View::make('site.SiteLayouts.listProduct')
            ->with('userAdmin', $this->userAdmin)
            ->with('paging',$paging)
            ->with('categoryName',$categoryName)
            ->with('dataCate',$dataCate)
            ->with('dataProductCate',$dataSearch);
        $this->footer();
    }

	public function listProductCategory($caid, $catname){
        $meta_title = $meta_keywords = $meta_description = $meta_img = '';
        $dataSearch = array();
        $paging = '';
        $categoryName = 'Danh mục';
        if($caid > 0) {
            $arrCat = Category::getByID($caid);
            if (sizeof($arrCat) > 0 && isset($arrCat->category_id) && $arrCat->category_id > 0 && isset($arrCat->category_status) && $arrCat->category_status == CGlobal::status_show ) {
                $categoryName = $arrCat->category_name;
                $pageNo = (int) Request::get('page_no',1);
                $limit = CGlobal::number_show_40;
                $offset = ($pageNo - 1) * $limit;
                $search = $data = array();
                $total = 0;
                $search['category_id'] = (int)$arrCat->category_id;
                $search['category_name'] = $arrCat->category_name;
                $dataSearch = Product::searchByConditionSite($search, $limit, $offset,$total);
                $paging = $total > 0 ? Pagging::getNewPager(3, $pageNo, $total, $limit, $search) : '';
            }else{
                return Redirect::route('site.home');
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $this->header();
        $this->layout->content = View::make('site.SiteLayouts.listProduct')
            ->with('userAdmin', $this->userAdmin)
            ->with('paging',$paging)
            ->with('categoryName',$categoryName)
            ->with('dataProductCate',$dataSearch);
        $this->footer();
	}
    public function listProductCatWithDepart($depart_id, $catid, $catname){
        $meta_title = $meta_keywords = $meta_description = $meta_img = '';
        $dataSearch = array();
        $paging = '';
        $categoryName = 'Danh mục';
        if($depart_id > 0 && $catid > 0) {
            $arrCat = Category::getByID($catid);
            if (sizeof($arrCat) > 0 && isset($arrCat->category_id) && $arrCat->category_id > 0 && isset($arrCat->category_status) && $arrCat->category_status == CGlobal::status_show ) {
                $categoryName = $arrCat->category_name;
                $pageNo = (int) Request::get('page_no',1);
                $limit = CGlobal::number_show_40;
                $offset = ($pageNo - 1) * $limit;
                $search = $data = array();
                $total = 0;
                $search['category_id'] = (int)$arrCat->category_id;
                $search['category_name'] = $arrCat->category_name;
                $search['depart_id'] = $depart_id;
                $dataSearch = Product::searchByConditionSite($search, $limit, $offset,$total);
                $paging = $total > 0 ? Pagging::getNewPager(3, $pageNo, $total, $limit, $search) : '';
            }else{
                return Redirect::route('site.home');
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $this->header();
        $this->layout->content = View::make('site.SiteLayouts.listProduct')
            ->with('userAdmin', $this->userAdmin)
            ->with('paging',$paging)
            ->with('categoryName',$categoryName)
            ->with('dataProductCate',$dataSearch);
        $this->footer();
	}
    public function listProductDepart($depart_id, $depart_name){
        $meta_title = $meta_keywords = $meta_description = $meta_img = '';
        $dataSearch = $dataCate = array();
        $paging = '';
        $categoryName = 'Danh mục';
        if($depart_id > 0) {
            $arrCat = Department::getByID($depart_id);
            if (sizeof($arrCat) > 0 && isset($arrCat->department_id) && $arrCat->department_id > 0 && isset($arrCat->department_status) && $arrCat->department_status == CGlobal::status_show ) {
                $categoryName = $arrCat->department_name;
                $pageNo = (int) Request::get('page_no',1);
                $limit = CGlobal::number_show_40;
                $offset = ($pageNo - 1) * $limit;
                $search = $data = array();
                $total = 0;
                $search['depart_id'] = (int)$arrCat->department_id;
                $search['department_name'] = $arrCat->department_name;
                $dataSearch = Product::searchByConditionSite($search, $limit, $offset,$total);
                if($total > 0){
                    foreach($dataSearch as $pro){
                        if(isset($dataCate[$pro->category_id])){
                            $dataCate[$pro->category_id]['count'] = $dataCate[$pro->category_id]['count'] +1;
                        }else{
                            $dataCate[$pro->category_id]['count'] = 1;
                            $dataCate[$pro->category_id]['nameCat'] = $pro->category_name;
                            $dataCate[$pro->category_id]['depart_id'] = $pro->depart_id;
                        }
                    }
                }
                $paging = $total > 0 ? Pagging::getNewPager(3, $pageNo, $total, $limit, $search) : '';
            }
            else{
                return Redirect::route('site.home');
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $this->header();
        $this->layout->content = View::make('site.SiteLayouts.listProduct')
            ->with('userAdmin', $this->userAdmin)
            ->with('paging',$paging)
            ->with('categoryName',$categoryName)
            ->with('dataCate',$dataCate)
            ->with('dataProductCate',$dataSearch);
        $this->footer();
	}

    public function detailProduct($namCate, $id){
        FunctionLib::site_css('lib/slickslider/slick.css', CGlobal::$POS_HEAD);
        FunctionLib::site_js('lib/slickslider/slick.min.js', CGlobal::$POS_END);
        FunctionLib::site_css('lib/slidermagnific/magnific-popup.css', CGlobal::$POS_HEAD);
        FunctionLib::site_js('lib/slidermagnific/magnific-popup.min.js', CGlobal::$POS_END);

        $meta_title = $meta_keywords = $meta_description = $meta_img = '';
        $product = array();
        $product_image_other = array();
        if((int)$id > 0){
            $product = Product::getProductByID($id);
            //check sản phẩm lỗi
            if(!isset($product->product_id)){
                //return Redirect::route('site.home');
            }
            if(isset($product->product_status) && $product->product_status == CGlobal::status_hide){
                return Redirect::route('site.home');
            }
            if(isset($product->is_block) && $product->is_block == CGlobal::PRODUCT_BLOCK){
                return Redirect::route('site.home');
            }
            if(sizeof($product) > 0){
                $meta_title = $product->product_name;
                $meta_keywords = $product->product_name;
                $meta_description = $product->product_name;
                $meta_img = ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $product->product_id, $product->product_image, CGlobal::sizeImage_200);
                if($product->product_image_other != ''){
                    $product_image_other = unserialize($product->product_image_other);
                }
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);
        //FunctionLib::debug($product);

        $arrDepart = Department::getDepart();

        $arrNumberBuy = array();
        for ($i = 1; $i <= 10; $i++) {
            $arrNumberBuy[$i] = $i;
        }
        $optionNumberBuy = FunctionLib::getOption($arrNumberBuy, 1);

        //Sản phầm cùng danh mục
        $arrProductSame = array();
        if(isset($product->category_id)){
            $limit = CGlobal::number_show_8;
            $offset = 0;
            $search = $data = array();
            $total = 0;
            $search['category_id'] = $product->category_id;
            $search['depart_id'] = $product->depart_id;
            $search['not_product_id'] = $product->product_id;
            $arrProductSame = Product::searchByCondition($search, $limit, $offset,$total);
        }
        $this->header();
        $this->layout->content = View::make('site.SiteLayouts.detailProduct')
            ->with('userAdmin', $this->userAdmin)
            ->with('arrDepart', $arrDepart)
            ->with('optionNumberBuy', $optionNumberBuy)
            ->with('product_image_other', $product_image_other)
            ->with('arrProductSame', $arrProductSame)
            ->with('product', $product);
        $this->footer();
    }
	public function offSite()
    {
        $userAdmin = User::user_login();
        if(empty($userAdmin)){
            $url_image = Config::get('config.WEB_ROOT').'images/cap-nhat-va-bao-tri-web.jpg';
            echo View::make('site.offSite', array('url_src_icon' => $url_image, 'date_off'=>86400 * 10));
            die();
        }
    }
}
