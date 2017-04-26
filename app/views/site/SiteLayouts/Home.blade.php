<div class="container">
    <div class="line-top">
        <div class="box-menu-list">
            <div class="content-box-menu">
                <?php if(isset($arrCategory) && !empty($arrCategory)){?>
                <ul>
                    <?php
                    $i=0;
                    foreach($arrCategory as $cat){
                    $i++;
                    if($i<=11){
                    ?>
                    <?php if(isset($cat['category_parent_name']) && $cat['category_parent_name'] != ''){ ?>
                    <li>
                        <a href="{{URL::route('site.listProduct', array('name'=>strtolower(FunctionLib::safe_title($cat['category_parent_name'])),'id'=>$cat['category_id']))}}" title="<?php echo $cat['category_parent_name'] ?>"><?php echo $cat['category_parent_name'] ?></a>
                        <?php if(isset($cat['arrSubCategory']) && !empty($cat['arrSubCategory'])) {?>
                        <?php
                        $url = '';
                        if($cat['category_image_background'] != ''){
                            $url = 'url('.FunctionLib::getThumbImage($cat['category_image_background'],$cat['category_id'],FOLDER_CATEGORY,735,428).') no-repeat bottom right';
                        } ?>
                        <div class="list-subcat" style="background: #fff <?php echo $url ?>">
                            <?php
                            $list_ul = array_chunk($cat['arrSubCategory'], 10);
                            ?>
                            <?php foreach($list_ul as $ul){?>
                            <ul>
                                <?php foreach($ul as $sub){ ?>
                                <li><a href="{{URL::route('site.listProduct', array('name'=>strtolower(FunctionLib::safe_title($sub['category_name'])),'id'=>$sub['category_id']))}}" title="<?php echo $sub['category_name'] ?>"><?php echo $sub['category_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
        @if(sizeof($arrSlider) != 0)
            <div class="slider-box-mid">
                <div id="sliderMid">
                    @foreach($arrSlider as $item)
                        <div class="slide ">
                            <a @if($item->banner_is_rel == CGlobal::LINK_NOFOLLOW) rel="nofollow" @endif @if($item->banner_is_target == CGlobal::BANNER_TARGET_BLANK) target="_blank" @endif title="{{$item->banner_name}}" href="@if($item->banner_link != '') {{$item->banner_link}} @else javascript:void(0) @endif">
                                <img src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_BANNER, $item->banner_id, $item->banner_image, CGlobal::sizeImage_750, '', true, CGlobal::type_thumb_image_banner, false)}}" alt="{{$item->banner_name}}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery('#sliderMid').bxSlider({
                            slideWidth: 720,
                            slideHeight: 428,
                            minSlides: 1,
                            maxSlides: 2,
                            slideMargin: 10,
                            mode: 'fade',
                            pager: true,
                            auto: true,
                        });
                    });
                </script>
            </div>
        @endif
    </div>
    <div class="line-box line-box-cat vip">
        <div class="cate-box">
            <div class="inner-cate-box hide-text-over">
                <h2 class="parent-cate act">
                    <a href="javascript:void(0)" datacatid="0" datatype="vip">Hàng nhập khẩu Đức</a>
                </h2>
            </div>
        </div>
        <div class="content-list-item ">
            <ul class="data-tab tab-0 act">
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>
                        
                   
                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="line-box line-box-cat vip">
        <div class="cate-box">
            <div class="inner-cate-box hide-text-over">
                <h2 class="parent-cate act">
                    <a href="javascript:void(0)" datacatid="0" datatype="vip">Hàng nhập khẩu Pháp</a>
                </h2>
            </div>
        </div>
        <div class="content-list-item ">
            <ul class="data-tab tab-0 act">
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="line-box line-box-cat vip">
        <div class="cate-box">
            <div class="inner-cate-box hide-text-over">
                <h2 class="parent-cate act">
                    <a href="javascript:void(0)" datacatid="0" datatype="vip">Hàng nhập khẩu Úc</a>
                </h2>
            </div>
        </div>
        <div class="content-list-item ">
            <ul class="data-tab tab-0 act">
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
                <li class="item">
                    <span class="sale-off">
                        -10%
                    </span>


                    <div class="post-thumb">
                        <a title="" href="">
                            <img src="https://static11.muachungcdn.com/thumb,80/240_240/i:plaza/product/product/-0-unnamed%20(3)-147997308770751/nuoc-rua-tay-dang-bot-huong-cam-200ml.jpg" alt="">
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title-info">
                            <h4 class="post-title">
                                <a title="" href="">Sản phẩm demo</a>
                            </h4>
                            <div class="item-price">
                                <span class="amount-1">200.000đ</span>
                                <span class="amount-2">300.000đđ</span>
                            </div>
                        </div>
                        <div class="mgt5 amount-call">
                            <a title="" class="link-shop" href="">Shopcuatui</a>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>

