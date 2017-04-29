<?php

/**
 * Created by PhpStorm.
 * User: Quynhtm
 * Date: 17/04/2016
 * Time: 3:29 CH
 */
class BaseSiteController extends BaseController
{
    protected $layout = 'site.BaseLayouts.index';
    protected $user = array();
    public function __construct(){
        FunctionLib::site_js('frontend/js/site.js', CGlobal::$POS_END);
        FunctionLib::site_js('frontend/js/cart.js', CGlobal::$POS_END);
    }

    public function header(){
        //Menu category
        $dataCategory = Category::getCategoriessAll();
        $arrCategory = $this->getTreeCategory($dataCategory);
        $numCart = $this->countNumCart();

        $this->layout->header = View::make("site.BaseLayouts.header")
                                ->with('arrCategory', $arrCategory)
                                ->with('numCart', $numCart);
    }

    public function footer(){
        $this->layout->footer = View::make("site.BaseLayouts.footer");
    }

    public function getTreeCategory($data){
        $arrCategory = array();
        if(!empty($data)){
            foreach ($data as $k=>$value){
                if($value['category_parent_id'] > 0){
                    $arrCategory[$value['category_parent_id']]['arrSubCategory'][] = array(
                        'category_id'=>$value['category_id'],
                        'category_order'=>$value['category_order'],//hien th? th? t? s?p x?p
                        'category_name'=>$value['category_name']);
                }else{
                    //thong tin parent
                    $arrCategory[$value['category_id']]['category_parent_name'] = $value['category_name'];
                    $arrCategory[$value['category_id']]['category_id'] = $value['category_id'];
                    $arrCategory[$value['category_id']]['category_status'] = $value['category_status'];
                    $arrCategory[$value['category_id']]['category_image_background'] = $value['category_image_background'];
                    $arrCategory[$value['category_id']]['category_order'] = $value['category_order'];//hien th? th? t? s?p x?p
                }
            }
            if(!empty($arrCategory)){
                foreach($arrCategory as $key => $val){
                    if(!isset($val['category_id'])){
                        unset($arrCategory[$key]);
                    }
                }
            }
            FunctionLib::sortArrayASC($arrCategory,"category_order");
        }
        return $arrCategory;
    }

    public function countNumCart(){
        $cartItem = 0;
        if(Session::has('cart')){
            $data = Session::get('cart');
            foreach($data as $v){
                if($v){
                    $cartItem += $v;
                }
            }
        }
        return $cartItem;
    }
}