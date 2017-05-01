<div class="link-top-head">
    <div class="container">
        <div class="box-login">
            <a href="{{URL::route('site.listCartOrder')}}" class="btnLog cart" rel="nofollow"><i class="cart"></i>Giỏ hàng (<span>@if(isset($numCart)) {{$numCart}} @endif </span>)</a>
        </div>
    </div>
</div>
<div class="center-header">
    <div class="container">
        <div class="top-header">
            @if(Route::currentRouteName() == 'site.home')
                <h1 id="logo"><a href="{{URL::route('site.home')}}"><img src="{{Config::get('config.WEB_ROOT')}}/assets/frontend/img/logo.png" alt="ShopCuaTui"></a></h1>
            @else
                <div id="logo"><a href="{{URL::route('site.home')}}"><img src="{{Config::get('config.WEB_ROOT')}}/assets/frontend/img/logo.png" alt="ShopCuaTui"></a></div>
            @endif
            <div class="box-top-header-right">
                <div class="search-top-center">
                    <div class="box-search">
                        {{Form::open(array('method' => 'GET', 'id'=>'frmsearch', 'class'=>'frmsearch', 'name'=>'frmsearch', 'url'=>URL::route('site.search')))}}
                            <input type="text" name="title-search" placeholder="Nhập tên sản phẩm cần tìm kiếm" value="@if(isset($product_name)){{$product_name}}@endif" class="keyword">
                            <input class="btn-search" value="Tìm kiếm" type="submit">
                        {{Form::close()}}
                    </div>
                </div>
                <div class="box-right-focus">
                    <div class="support-contact">
                        <i class="icon-phone"></i> Hỗ trợ
                        <i class="idrop"></i>
                        <div class="box-hover-support-contact">
                            <div class="top-arrow-box"><i></i></div>
                            <div class="custommer">
                                <b>Dành cho khách hàng:</b> Để mua sản phẩm bạn vui lòng liên hệ theo số điện thoại trong tin đăng của các shop.
                            </div>
                            <div class="support-user-shop">
                                <b>Dành cho chủ shop:</b>
                                <ul>
                                    <li>
                                        <i></i>
                                        CSKH: <b>0985.10.10.26 - 0913.922.986</b>
                                    </li>
                                    <li>
                                        <i></i>
                                        Đăng ký quảng cáo: <b>0985.10.10.26 - 0913.922.986</b>
                                    </li>
                                    <li>
                                        <i></i>
                                        Hỗ trợ trực tuyến:
                                        <a title="Hỗ trợ trực tuyến qua Skype!" href="skype:nguyenduypt86?chat" class="chat-sky" rel="nofollow"></a>
                                        <a title="Hỗ trợ trực tuyến qua Skype!" href="skype:mercury_0206?chat" class="chat-sky" rel="nofollow"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-header-link">
            <div class="box-menu-title @if(Route::currentRouteName() != 'site.home') box-menu-hover @endif">
                <div class="title-cat-menu">
                    <div class="icon-cat-title">
                        <span class="ic-line"></span>
                        <span class="ic-line"></span>
                        <span class="ic-line"></span>
                    </div>
                    Danh mục sản phẩm
                </div>
                @if(Route::currentRouteName() != 'site.home')
                <div class="content-box-menu @if(Route::currentRouteName() != 'site.home') header-menu-other @endif">
                    <?php if(isset($arrDepart) && !empty($arrDepart)){?>
                    <ul>
                        <?php
                        $i=0;
                        foreach($arrDepart as $depart_id =>$depart_name){
                        $i++;
                        if($i<=11){
                        ?>
                        <?php if(isset($depart_name) && $depart_name != ''){ ?>
                        <li>
                            <a href="{{URL::route('site.listProductDepart', array('name'=>strtolower(FunctionLib::safe_title($depart_name)),'depart_id'=>$depart_id))}}" title="<?php echo $depart_name ?>"><?php echo $depart_name ?></a>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                @endif
            </div>
            <div class="right-ultity">
                <div class="part1-right-ultity">
                    <div class="list-product-new">
                        <!--<i class="icon-list-new"></i> <a href="" title="Hàng sale off"> Hàng giảm giá</a>-->
                    </div>
                </div>
                <div class="part2-right-ultity">
                    <div class="shop-create">
                        <i></i>
                        <b>Mua hàng:</b><br>
                        <span>Đơn giản nhất</span>
                    </div>
                    <div class="shop-transfer">
                        <i></i>
                        <b>Ship hàng:</b><br>
                        <span>Giao hàng sớm nhất</span>
                    </div>
                    <div class="shop-diversity">
                        <i></i>
                        <b>Sản phẩm:</b><br>
                        <span>Đủ các mặt hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

