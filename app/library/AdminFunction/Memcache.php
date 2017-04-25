<?php
class Memcache{
    const CACHE_ON = 0 ;// 0: khong dung qua cache, 1: dung qua cache
    const CACHE_TIME_TO_LIVE_5 = 300; //Time cache 5 phut
    const CACHE_TIME_TO_LIVE_15 = 900; //Time cache 15 phut
    const CACHE_TIME_TO_LIVE_30 = 1800; //Time cache 30 phut
    const CACHE_TIME_TO_LIVE_60 = 3600; //Time cache 60 phut

    const CACHE_TIME_TO_LIVE_ONE_DAY = 86400; //Time cache 1 ngay
    const CACHE_TIME_TO_LIVE_ONE_WEEK = 604800; //Time cache 1 tuan
    const CACHE_TIME_TO_LIVE_ONE_MONTH = 2419200; //Time cache 1 thang
    const CACHE_TIME_TO_LIVE_ONE_YEAR =  29030400; //Time cache 1 nam

    //user customer
    const CACHE_ALL_CUSTOMER = 'cache_all_customer';
    const CACHE_CUSTOMER_ID = 'cache_customer_id_';

    //danh mục
    const CACHE_ALL_CATEGORY    = 'cache_all_category';
    const CACHE_ALL_PARENT_CATEGORY    = 'cache_all_parent_category';
    const CACHE_ALL_SHOW_CATEGORY_FRONT    = 'cache_all_show_category_front';
    const CACHE_ALL_CHILD_CATEGORY_BY_PARENT_ID    = 'cache_all_child_by_parent_id_';
    const CACHE_CATEGORY_ID    = 'cache_category_id_';

    const CACHE_ALL_CATEGORY_BY_TYPE = 'cache_all_category_by_type_';
    const CACHE_ALL_CATEGORY_RIGHT = 'cache_all_category_right';

    //depart
    const CACHE_DEPARTMENT_ID    = 'cache_department_id_';
    const CACHE_ALL_DEPARTMENT    = 'cache_all_department';

    //depart
    const CACHE_TYPE_SETTING_ID    = 'cache_type_setting_id_';
    const CACHE_GROUP_TYPE_SETTING    = 'cache_group_type_setting_';
    const CACHE_KEYWORD_TYPE_SETTING    = 'cache_keyword_type_setting_';

    //depart
    const CACHE_CATEGORY_DEPARTMENT_ID    = 'cache_category_depart_id_';

    //tin đăng
    const CACHE_ITEM_ID    = 'cache_item_id_';
    const CACHE_ITEM_HOME_CATEGORY_ID   = 'cache_item_home_category_id_';

    //tin tức
    const CACHE_NEW_ID    = 'cache_news_id_';

    //tin tức
    const CACHE_PRODUCT_ID    = 'cache_product_id_';

    //size image
    const CACHE_SIZE_IMAGE_ID    = 'cache_size_image_id_';
    const CACHE_SIZE_IMAGE    = 'cache_list_size_image';

    //share
    const CACHE_SHARE_OBJECT_ID    = 'cache_share_object_id_';

    //banner
    const CACHE_BANNER_ID    = 'cache_banner_id_';
    const CACHE_BANNER_ADVANCED    = 'cache_banner_advanced';

    //video
    const CACHE_VIDEO_ID    = 'cache_video_id_';

    //thu vien anh
    const CACHE_IMAGE_ID    = 'cache_image_id_';

    //Tinh thanh
    const CACHE_ALL_PROVICE = 'cache_all_provice';
    const CACHE_PROVICE_ID = 'cache_provice_id_';

    //provider: NCC cho shop
    const CACHE_ALL_PROVIDER = 'cache_all_provider';
    const CACHE_PROVIDER_ID = 'cache_provider_id_';
    const CACHE_LIST_PROVIDER_BY_SHOP_ID = 'cache_provider_by_shop_id_';

    //user shop
    const CACHE_ALL_USER_SHOP = 'cache_all_user_shop';
    const CACHE_USER_SHOP_ID = 'cache_user_shop_id_';
    const CACHE_CATEGORY_SHOP_ID = 'cache_category_shop_id_';

    //Info
    const CACHE_INFO_ID    = 'cache_info_id_';
    const CACHE_INFO_KEYWORD    = 'cache_info_keyword_';
    const CACHE_INFO_TYPEINFO_TYPELANGUAGE    = 'cache_info_typeinfo_typelanguage_';
    //Lang
    const CACHE_LANG_ID    = 'cache_lang_id_';
    const CACHE_LANG_KEYWORD_LANGUAGE    = 'cache_info_keyword_language_';

    //Thung rac
    const CACHE_TRASH_ID    = 'cache_trash_id_';

    //Tinh thành
    const CACHE_ALL_PROVINCE = 'cache_all_province';
    const CACHE_PROVINCE_ID = 'cache_province_id_';

    //quan huyen
    const CACHE_DISTRICT_ID = 'cache_district_id_';
    const CACHE_DISTRICT_WITH_PROVINCE_ID = 'cache_district_with_province_id_';
}
