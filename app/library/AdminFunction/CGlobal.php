<?php
/**
 * Created by JetBrains PhpStorm.
 * User: QuynhTM
 */
class CGlobal{
    static $css_ver = 1;
    static $js_ver = 1;
    public static $POS_HEAD = 1;
    public static $POS_END = 2;
    public static $extraHeaderCSS = '';
    public static $extraHeaderJS = '';
    public static $extraFooterCSS = '';
    public static $extraFooterJS = '';
    public static $extraMeta = '';
    public static $pageAdminTitle = 'Dashboard Admin';
    public static $pageShopTitle = 'HaiChau Admin';

    const web_name = 'Haichau.com.vn';
    const web_keywords= 'Bánh kẹo Hải Châu';
    const web_description= 'Bánh kẹo Hải Châu';
    public static $pageTitle = 'Bánh kẹo Hải Châu';
    
    const num_scroll_page = 2;
    const number_limit_show = 30;
    const number_show_30 = 30;
    const number_show_40 = 40;
    const number_show_20 = 20;
    const number_show_15 = 15;
    const number_show_10 = 10;
    const number_show_5 = 5;
    const number_show_8 = 8;

    const max_num_buy_item_product = 10;
    /**
     * Dinh nghi kich thuoc anh Sản phẩm
     */
    const type_thumb_image_product = 1;
    const type_thumb_image_banner = 2;

    const sizeImage_80 = 80;
    const sizeImage_100 = 100;//dung common
    const sizeImage_150 = 150;
    const sizeImage_200 = 200;
    const sizeImage_300 = 300;
    const sizeImage_450 = 450;
    const sizeImage_500 = 500;
    const sizeImage_600 = 600;
    const sizeImage_750 = 750;
    const sizeImage_1020 = 1020;

    const sizeImage_1000 = 1000;
    const sizeImage_1010 = 1010;
    const sizeImage_90 = 90;//banner header

    const freeSizeImage_300 = 301;

    //size anh cho tin rao
    public static $arrSizeImage = array(
        self::sizeImage_80 =>array('w'=>self::sizeImage_80,'h'=>self::sizeImage_80),
        self::sizeImage_100 =>array('w'=>self::sizeImage_100,'h'=>self::sizeImage_100),
        self::sizeImage_150 =>array('w'=>self::sizeImage_150,'h'=>self::sizeImage_100),
        self::sizeImage_200 =>array('w'=>self::sizeImage_200,'h'=>self::sizeImage_150),
        self::sizeImage_300 =>array('w'=>self::sizeImage_300,'h'=>self::sizeImage_300),
    	self::sizeImage_600 =>array('w'=>self::sizeImage_600,'h'=>self::sizeImage_600),//insert vao noi dung
        self::sizeImage_500 =>array('w'=>self::sizeImage_500,'h'=>self::sizeImage_300),
    );

    //dinh nghĩa khung ảnh hiển thị bên ngoài
    const size_imge_show_list_60 = ' height="60" width="120" ';
    const size_imge_show_list_150 = ' height="80" width="150" ';
    const size_imge_show_list_180 = ' height="180" width="300" ';
    const size_imge_show_detail = ' height="100" width="500" ';
    /**
     * Dinh nghi kich thuoc anh Banner
     */
    public static $arrBannerSizeImage = array(
        self::sizeImage_100 =>array('w'=>self::sizeImage_100,'h'=>self::sizeImage_100),
        self::sizeImage_200 =>array('w'=>self::sizeImage_200,'h'=>self::sizeImage_600),
        self::sizeImage_300 =>array('w'=>self::sizeImage_300,'h'=>self::sizeImage_300),
    	self::sizeImage_450 =>array('w'=>self::sizeImage_450,'h'=>self::sizeImage_450),
    	self::sizeImage_750 =>array('w'=>self::sizeImage_750,'h'=>self::sizeImage_450),
        self::sizeImage_1000 =>array('w'=>self::sizeImage_1000,'h'=>0),
    	self::sizeImage_1020 =>array('w'=>self::sizeImage_1020,'h'=>0),
    	self::freeSizeImage_300 =>array('w'=>self::freeSizeImage_300,'h'=>0),
    	1 =>array('w'=>self::sizeImage_1010,'h'=>self::sizeImage_90),//banner header
    );
	
    
    const status_show = 1;
    const status_hide = 0;
    const status_block = -1;

    /****************************************************************************
     * ĐỊnh nghĩa đơn hàng
     * **************************************************************************
     */
    const order_cod_chuagiao = 0;//chưa chuyển hàng
    const order_cod_da_gan = 1;//đã gán COD
    const order_cod_danggiao = 2;//COD dang chuyển hàng
    const order_cod_da_giaohang = 3;//đã giao hàng
    const order_cod_hoantra = 4;//hoàn trả hàng

    const order_status_new = 1;//1: đơn hàng mới
    const order_status_confirm = 2;// đơn hàng đã xác nhận
    const order_status_succes = 3;//đơn hàng hoàn thành
    const order_status_remove = 4;// đơn hàng bị hủy

    const order_type_site = 0;// đặt hàng từ site
    const order_type_shop = 1;// đặt hàng từ hệ thống

    /****************************************************************************
     * END đơn hàng
     * **************************************************************************
     */
    const category_product = 5;
    const category_new = 6;

    //is_login Customer
    const not_login = 0;
    const is_login = 1;

    const province_id_hanoi = 22;

    //Tin tuc
    const NEW_CATEGORY_TIN_TUC_CHUNG = 1;
    const NEW_CATEGORY_GIOI_THIEU = 2;
    const NEW_CATEGORY_QUANG_CAO = 3;

    const NEW_TYPE_TIN_TUC = 1;
    const NEW_TYPE_GIOI_THIEU = 2;
    const NEW_TYPE_QUANG_CAO = 3;

    public static $arrCategoryNew = array(-1 => '--- Chọn danh mục ---',
        self::NEW_CATEGORY_TIN_TUC_CHUNG => 'Tin tức chung',
        self::NEW_CATEGORY_GIOI_THIEU => 'Tin giới thiệu',
        self::NEW_CATEGORY_QUANG_CAO => 'Tin quảng cáo',
    );
    public static $arrTypeNew = array(-1 => '--- Chọn kiểu tin ---',
        self::NEW_TYPE_TIN_TUC => 'Tin tức chung',
        self::NEW_TYPE_GIOI_THIEU => 'Tin Hỗ trợ',
        self::NEW_TYPE_QUANG_CAO => 'Tin quảng cáo',
    );

    const TYPE_LANGUAGE_VIET = 1;
    const TYPE_LANGUAGE_LAO = 2;
    const TYPE_LANGUAGE_ENG = 3;
    public static $arrLanguage= array(
        self::TYPE_LANGUAGE_VIET => 'Viet Nam',
        self::TYPE_LANGUAGE_LAO => 'Lao',
        self::TYPE_LANGUAGE_ENG => 'English',
    );


    const IMAGE_ERROR = 133;
    const FOLDER_NEWS = 'news';
    const FOLDER_BANNER = 'banner';
    const FOLDER_PRODUCT = 'product';
    const FOLDER_CATEGORY = 'category';
    const FOLDER_INFORSEO = 'inforSeo';
    const FOLDER_LIBRARY_IMAGE = 'libraryImage';

	const FOLDER_INFO = 'info';

    //shop
    const SHOP_FREE = 1;
    const SHOP_NOMAL = 2;
    const SHOP_VIP = 3;
    const SHOP_ONLINE = 1;
    const SHOP_OFFLINE = 0;
    const SHOP_NUMBER_PRODUCT_FREE = 5;
    const SHOP_NUMBER_PRODUCT_NOMAL = 100;
    const SHOP_NUMBER_PRODUCT_VIP = 5000;

    //customer
    const CUSTOMER_FREE = 1;
    const CUSTOMER_NOMAL = 2;
    const CUSTOMER_VIP = 3;
    const CUSTOMER_ONLINE = 1;
    const CUSTOMER_OFFLINE = 0;
    const CUSTOMER_GENDER_GIRL = 0;
    const CUSTOMER_GENDER_BOY = 1;

    //items
    const ITEMS_TYPE_ACTION_1 = 1; //1: Cần bán/ Tuyển sinh,
    const ITEMS_TYPE_ACTION_2 = 2; //2:Cần mua/ Tuyển dụng

    //product
    const TYPE_PRICE_NUMBER = 1;
    const TYPE_PRICE_CONTACT = 2;
    const PRODUCT_NOMAL = 1;
    const PRODUCT_HOT = 2;
    const PRODUCT_SELLOFF = 3;
    const PRODUCT_BLOCK = 0;
    const PRODUCT_NOT_BLOCK = 1;
    const PRODUCT_IS_SALE = 1;//con hàng
    const PRODUCT_NOT_IS_SALE = 0;//het hàng

    //order
    const ORDER_STATUS_DELETE = 0;
    const ORDER_STATUS_NEW = 1;
    const ORDER_STATUS_CHECKED = 2;
    const ORDER_STATUS_SUCCESS = 3;
    const ORDER_STATUS_CANCEL = 4;

    //banner
    const BANNER_NOT_RUN_TIME = 0;
    const BANNER_IS_RUN_TIME = 1;
    const BANNER_NOT_TARGET_BLANK = 0;
    const BANNER_TARGET_BLANK = 1;

    const BANNER_TYPE_TOP = 1;
    const BANNER_TYPE_LEFT = 2;
    const BANNER_TYPE_RIGHT = 3;
    const BANNER_TYPE_BOTTOM = 4;
    const BANNER_TYPE_CENTER = 5;
    const BANNER_TYPE_SLIDE = 6;

    //page gắn link quảng cáo
    const BANNER_PAGE_HOME = 1;
    const BANNER_PAGE_DETAIL = 2;
    const BANNER_PAGE_CATEGORY = 3;
    const BANNER_PAGE_CUSTOMER_ITEMS = 4;
    const BANNER_PAGE_CONTACT = 5;
    const BANNER_PAGE_SEARCH = 6;
    const BANNER_PAGE_OTHER = 7;

    public static $arrPageCurrent = array(
        'index' => self::BANNER_PAGE_HOME,
        'pageListItemCustomer' => self::BANNER_PAGE_CUSTOMER_ITEMS,
        'pageCategory' => self::BANNER_PAGE_CATEGORY,
        'pageContact' => self::BANNER_PAGE_CONTACT,
        'searchItems' => self::BANNER_PAGE_SEARCH,

        'pageDetailItem' => self::BANNER_PAGE_DETAIL,
        'pageDetailNew' => self::BANNER_PAGE_DETAIL,

        'page404' => self::BANNER_PAGE_OTHER,
        'pageNews' => self::BANNER_PAGE_OTHER,
    );

    const LINK_NOFOLLOW = 0;
    const LINK_FOLLOW = 1;
   
    //Duy bo sung
    const emailAdmin = 'nguyenduypt86@gmail.com';
    
    public static $arrIconSpecals = array(
    	'\r\n', '☎', '👉', '✈', '🍬', '🏃', '🏻', '😁','🍬', '🏃🏻', '💃🏽', '✅', '😜', '🌳', '🌴', '🌲', '🌱',
    	'🌻', '🐮', '🐃', '🐎', '🐎', '🐓', '🐔', '🐗', '💥'
    );
    const linkMail = 'http://mail.cdsptw.edu.vn';
}