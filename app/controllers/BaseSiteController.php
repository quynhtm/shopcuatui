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

    }

    public function header(){
        $this->layout->header = View::make("site.BaseLayouts.header");
    }

    public function footer(){
        $this->layout->footer = View::make("site.BaseLayouts.footer");
    }
}