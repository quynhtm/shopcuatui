<?php
class SiteHomeController extends BaseSiteController{
    public function __construct(){
        parent::__construct();
        FunctionLib::site_css('lib/font-awesome/4.2.0/css/font-awesome.min.css', CGlobal::$POS_HEAD);
        return $this->offSite();
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

        ////Menu category
        $dataCategory = Category::getCategoriessAll();
        $arrCategory = $this->getTreeCategory($dataCategory);

        $this->layout->content = View::make('site.SiteLayouts.Home')
            ->with('arrCategory', $arrCategory)
            ->with('arrSlider', $arrSlider);

        $this->footer();
    }
	public function listProduct($catname, $caid){
        $meta_title = $meta_keywords = $meta_description = $meta_img = '';
        if($caid > 0) {
            $arrCat = Category::getByID($caid);
            if (sizeof($arrCat) > 0) {
                $meta_title = stripslashes($arrCat->category_name);
                $meta_keywords = stripslashes($arrCat->category_meta_keywords);
                $meta_description = stripslashes($arrCat->category_meta_description);
            }
        }
        FunctionLib::SEO($meta_img, $meta_title, $meta_keywords, $meta_description);

        $this->header($caid);
        $this->layout->content = View::make('site.SiteLayouts.listProduct');
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
