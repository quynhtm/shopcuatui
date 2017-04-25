<?php
/**
 * Created by PhpStorm.
 * User: QuynhTM
 */
/*
 * **********************************************************************************************************************************
 * Route site
 * kh�ng c?n ??ng nh?p v?n xem ?c
 * **********************************************************************************************************************************
 * */
/*home*/
Route::any('/', array('as' => 'site.home','uses' => 'SiteHomeController@index'));
Route::get('404.html',array('as' => 'site.page404','uses' =>'SiteHomeController@page404'));
Route::post('load-product-with-category.html',array('as' => 'site.ajaxLoadItemSubCategory','uses' =>'SiteHomeController@ajaxLoadItemSubCategory'));//ajax
/*product*/
Route::get('tim-kiem.html',array('as' => 'site.search','uses' => 'SiteHomeController@searchProduct'));
Route::get('san-pham-moi.html',array('as' => 'site.product_new','uses' => 'SiteHomeController@listProductNew'));
Route::get('{cat}/{id}-{name}.html',array('as' => 'site.detailProduct','uses' =>'SiteHomeController@detailProduct'))->where('id', '[0-9]+');
Route::get('c-{id}/{name}.html',array('as' => 'site.listProduct','uses' =>'SiteHomeController@listProduct'))->where('id', '[0-9]+');
/*tin t?c*/
Route::get('n-{id}/{name}.html',array('as' => 'site.listNewSearch','uses' =>'SiteHomeController@listNewSearch'))->where('id', '[0-9]+');
Route::get('tin-tuc.html',array('as' => 'site.listNew','uses' =>'SiteHomeController@homeNew'));
Route::get('tin-tuc/c{cat_id}/{id}-{name}.html',array('as' => 'site.detailNew','uses' =>'SiteHomeController@detailNew'))->where('cat_id', '[0-9]+')->where('id', '[0-9]+');


//Ph?n li�n quan ??n gi? h�ng, ??t h�ng, kh�ch mua h�ng
Route::post('them-vao-gio-hang.html', array('as' => 'site.ajaxAddCart','uses' => 'SiteOrderController@ajaxAddCart'));
Route::match(['GET','POST'], 'gio-hang.html',array('as' => 'site.listCartOrder','uses' =>'SiteOrderController@listCartOrder'));
Route::match(['GET','POST'], 'xoa-mot-san-pham-trong-gio-hang.html', array('as' => 'site.deleteOneItemInCart','uses' => 'SiteOrderController@deleteOneItemInCart'));
Route::match(['GET','POST'], 'xoa-gio-hang.html', array('as' => 'site.deleteAllItemInCart','uses' => 'SiteOrderController@deleteAllItemInCart'));
Route::match(['GET','POST'], 'gui-don-hang.html',array('as' => 'site.sendCartOrder','uses' =>'SiteOrderController@sendCartOrder'));
Route::get('cam-on-da-mua-hang.html',array('as' => 'site.thanksBuy','uses' =>'SiteOrderController@thanksBuy'));

Route::match(['GET','POST'], 'load-info-customer-shop.html',array('as' => 'site.loadInfoPhoneCustomerShop','uses' =>'SiteOrderController@loadInfoPhoneCustomerShop'));

//trang ch? shop
Route::get('shop-{shop_id}/{shop_name}.html',array('as' => 'shop.home','uses' =>'SiteShopController@shopIndex'))->where('shop_id', '[0-9]+');
Route::get('shop-{shop_id}/c-{cat_id}/{cat_name}.html',array('as' => 'shop.shopListProduct','uses' =>'SiteShopController@shopListProduct'))->where('shop_id', '[0-9]+')->where('cat_id', '[0-9]+');
//login, dang ky, logout shop,quen mat khau
Route::get('dang-nhap.html',array('as' => 'site.shopLogin','uses' =>'SiteShopController@shopLogin'));
Route::post('dang-nhap.html', array('as' => 'site.shopLogin','uses' => 'SiteShopController@login'));
Route::get('dang-xuat.html',array('as' => 'site.shopLogout','uses' =>'SiteShopController@shopLogout'));
Route::get('dang-ky.html',array('as' => 'site.shopRegister','uses' =>'SiteShopController@shopRegister'));
Route::post('dang-ky.html',array('as' => 'site.shopRegister','uses' =>'SiteShopController@postShopRegister'));
Route::get('quen-mat-khau.html',array('as' => 'site.shopForgetPass','uses' =>'SiteShopController@shopForgetPass'));
Route::post('quen-mat-khau.html',array('as' => 'site.shopForgetPass','uses' =>'SiteShopController@postShopForgetPass'));

/*
 * **********************************************************************************************************************************
 * Route shop common
 * Phai login = account Shop v?i thao t�c ?c
 * **********************************************************************************************************************************
 * */

//Action cua shop da login
Route::get('thong-tin-shop.html',array('as' => 'shop.inforShop','uses' =>'ShopActionController@shopInfor'));
Route::post('thong-tin-shop.html',array('as' => 'shop.inforShop','uses' =>'ShopActionController@updateShopInfor'));
//d�i pass
Route::get('thay-doi-pass.html', array('as' => 'site.shopChangePass','uses' => 'ShopActionController@shopChangePass'));
Route::post('thay-doi-pass.html', array('as' => 'site.shopChangePass','uses' => 'ShopActionController@postChangePass'));
//quan l� li�n h? v?i qu?n tr?
Route::get('lien-he-quan-tri.html',array('as' => 'shop.lisContact','uses' =>'ShopActionController@shopLisContact'));


//quan ly page shop admin: qu?n l� s?n ph?m v� li�n quan ??n s?n ph?m
Route::get('shop-cua-tui.html',array('as' => 'shop.adminShop','uses' =>'ShopController@shopAdmin'));
//san ph?m c?a shop
Route::get('quan-ly-san-pham.html',array('as' => 'shop.listProduct','uses' =>'ShopController@shopListProduct'));
Route::get('them-san-pham.html',array('as' => 'shop.addProduct','uses' =>'ShopController@getAddProduct'));
Route::get('cap-nhat-san-pham/p-{product_id}-{product_name}.html',array('as' => 'shop.editProduct','uses' =>'ShopController@getEditProduct'))->where('product_id', '[0-9]+');
Route::post('cap-nhat-san-pham/p-{product_id}-{product_name}.html',array('as' => 'shop.editProduct','uses' =>'ShopController@postEditProduct'))->where('product_id', '[0-9]+');
Route::post('shop/setOntop',array('as' => 'shop.setOntop','uses' =>'ShopController@setOnTopProduct'));//ajax
Route::post('shop/getImageProductOther',array('as' => 'shop.getImageProductOther','uses' =>'ShopController@getImageProductOther'));//ajax
Route::post('shop/deleteProduct',array('as' => 'shop.deleteProduct','uses' =>'ShopController@deleteProduct'));//ajax
Route::post('shop/removeImage',array('as' => 'shop.removeImage','uses' =>'ShopController@removeImage'));//ajax
//don h�ng c?a shop
Route::get('quan-ly-don-hang.html',array('as' => 'shop.listOrder','uses' =>'ShopController@shopListOrder'));
Route::get('export-don-hang.html',array('as' => 'shop.exportOrder','uses' =>'ShopController@exportOrder'));
Route::post('shop/changeStatusOrder',array('as' => 'shop.changeStatusOrder','uses' =>'ShopController@changeStatusOrder'));//ajax

/*
 * **********************************************************************************************************************************
 * * Action cho shop VIP
 * **********************************************************************************************************************************
 * */
//quan ly banner c?a shop VIP
Route::get('quan-ly-quang-cao.html',array('as' => 'shop.listBanner','uses' =>'ShopVipController@listBanner'));
Route::get('them-quang-cao.html',array('as' => 'shop.addBanner','uses' =>'ShopVipController@getAddBanner'));
Route::get('cap-nhat-quang-cao/b-{banner_id}-{banner_name}.html',array('as' => 'shop.editBanner','uses' =>'ShopVipController@getEditBanner'))->where('banner_id', '[0-9]+');
Route::post('cap-nhat-quang-cao/b-{banner_id}-{banner_name}.html',array('as' => 'shop.editBanner','uses' =>'ShopVipController@postEditBanner'))->where('banner_id', '[0-9]+');
Route::post('shop/deleteBanner',array('as' => 'shop.deleteBanner','uses' =>'ShopVipController@deleteBanner'));//ajax
Route::post('shop/removeImageBanner',array('as' => 'shop.removeImageBanner','uses' =>'ShopVipController@removeImageBanner'));//ajax

//quan ly NCC c?a shop VIP
Route::get('quan-ly-nha-cung-cap.html',array('as' => 'shop.listProvider','uses' =>'ShopVipController@listProvider'));
Route::get('them-nha-cung-cap.html',array('as' => 'shop.addProvider','uses' =>'ShopVipController@getAddProvider'));
Route::get('cap-nhat-nha-cung-cap/ncc-{provider_id}-{provider_name}.html',array('as' => 'shop.editProvider','uses' =>'ShopVipController@getEditProvider'))->where('provider_id', '[0-9]+');
Route::post('cap-nhat-nha-cung-cap/ncc-{provider_id}-{provider_name}.html',array('as' => 'shop.editProvider','uses' =>'ShopVipController@postEditProvider'))->where('provider_id', '[0-9]+');
Route::post('shop/deleteProvider',array('as' => 'shop.deleteProvider','uses' =>'ShopVipController@deleteProvider'));//ajax

//quan ly B�n h�ng Offline c?a shop VIP
Route::get('ban-hang-online.html',array('as' => 'shop.orderShopOffline','uses' =>'ShopVipController@orderShopOffline'));
Route::post('shop/getInforShopCart',array('as' => 'shop.getInforShopCart','uses' =>'ShopVipController@getInforShopCart'));//ajax
Route::post('shop/orderBuyShopCart',array('as' => 'shop.orderBuyShopCart','uses' =>'ShopVipController@orderBuyShopCart'));//ajax
Route::post('shop/deleteOneItemShopCart',array('as' => 'shop.deleteOneItemShopCart','uses' =>'ShopVipController@deleteOneItemShopCart'));//ajax
Route::post('shop/changeNumberBuyShopCart',array('as' => 'shop.changeNumberBuyShopCart','uses' =>'ShopVipController@changeNumberBuyShopCart'));//ajax