<?php
/**
 * Created by PhpStorm.
 * User: QuynhTM
 */

/*home*/
Route::any('/', array('as' => 'site.home','uses' => 'SiteHomeController@index'));
Route::get('404.html',array('as' => 'site.page404','uses' =>'SiteHomeController@page404'));

//San pham
Route::get('tim-kiem.html',array('as' => 'site.search','uses' => 'SiteHomeController@searchProduct'));
Route::get('san-pham-moi.html',array('as' => 'site.product_new','uses' => 'SiteHomeController@listProductNew'));
Route::get('{cat}/{id}-{name}.html',array('as' => 'site.detailProduct','uses' =>'SiteHomeController@detailProduct'))->where('id', '[0-9]+');
Route::get('c-{id}/{name}.html',array('as' => 'site.listProduct','uses' =>'SiteHomeController@listProductCategory'))->where('id', '[0-9]+');
Route::get('nhapkhau-{depart_id}/c-{id}/{name}.html',array('as' => 'site.listProductCatWithDepart','uses' =>'SiteHomeController@listProductCatWithDepart'))->where('depart_id', '[0-9]+')->where('id', '[0-9]+');
Route::get('nhapkhau-{id}/{name}.html',array('as' => 'site.listProductDepart','uses' =>'SiteHomeController@listProductDepart'))->where('depart_id', '[0-9]+');

//Tin tuc
Route::get('n-{id}/{name}.html',array('as' => 'site.listNewSearch','uses' =>'SiteHomeController@listNewSearch'))->where('id', '[0-9]+');
Route::get('tin-tuc.html',array('as' => 'site.listNew','uses' =>'SiteHomeController@homeNew'));
Route::get('tin-tuc/c{cat_id}/{id}-{name}.html',array('as' => 'site.detailNew','uses' =>'SiteHomeController@detailNew'))->where('cat_id', '[0-9]+')->where('id', '[0-9]+');

//Gio hang
Route::post('them-vao-gio-hang.html', array('as' => 'site.ajaxAddCart','uses' => 'SiteOrderController@ajaxAddCart'));
Route::match(['GET','POST'], 'gio-hang.html',array('as' => 'site.listCartOrder','uses' =>'SiteOrderController@listCartOrder'));
Route::match(['GET','POST'], 'xoa-mot-san-pham-trong-gio-hang.html', array('as' => 'site.deleteOneItemInCart','uses' => 'SiteOrderController@deleteOneItemInCart'));
Route::match(['GET','POST'], 'xoa-gio-hang.html', array('as' => 'site.deleteAllItemInCart','uses' => 'SiteOrderController@deleteAllItemInCart'));
Route::match(['GET','POST'], 'gui-don-hang.html',array('as' => 'site.sendCartOrder','uses' =>'SiteOrderController@sendCartOrder'));
Route::get('cam-on-da-mua-hang.html',array('as' => 'site.thanksBuy','uses' =>'SiteOrderController@thanksBuy'));
