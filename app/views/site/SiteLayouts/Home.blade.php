<div class="container">
    <div class="line-top">
        <div class="box-menu-list">
            <div class="content-box-menu">
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
    @if($arrProductHome != null)
        @foreach($arrProductHome as $depart_id=>$val_depart)
            @if(sizeof($val_depart['product']) > 0  )
            <div class="line-box line-box-cat vip">
                <div class="cate-box">
                    <div class="inner-cate-box hide-text-over">
                        <h2 class="parent-cate act">
                            <a href="javascript:void(0)" datacatid="0" datatype="vip">{{$val_depart['depart_name']}}</a>
                        </h2>
                    </div>
                </div>
                <div class="content-list-item {{(FunctionLib::checkOS()) ? 'phone' : ''}}">
                    <ul class="data-tab tab-0 act">
                        @foreach($val_depart['product'] as $key=>$item)
                            <li class="item @if(($key+1)%5 == 0) item-not-mg @endif">
                                @if($item->product_type_price == 1)
                                    @if((float)$item->product_price_market > (float)$item->product_price_sell)
                                        <span class="sale-off">
                                            -{{ number_format(100 - ((float)$item->product_price_sell/(float)$item->product_price_market)*100, 1) }}%
                                        </span>
                                    @endif
                                @endif
                                <div class="post-thumb">
                                    <a title="{{$item->product_name}}" href="{{FunctionLib::buildLinkDetailProduct($item->product_id, $item->product_name, $item->category_name)}}">
                                        <img alt="{{$item->product_name}}" src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $item['product_id'], $item['product_image'], CGlobal::sizeImage_300)}}"
                                             data-other-src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $item['product_id'], $item['product_image_hover'], CGlobal::sizeImage_300)}}">
                                    </a>
                                </div>
                                <div class="item-content">
                                    <div class="title-info">
                                        <h4 class="post-title">
                                            <a title="{{$item->product_name}}" href="{{FunctionLib::buildLinkDetailProduct($item->product_id, $item->product_name, $item->category_name)}}">{{$item->product_name}}</a>

                                        </h4>

                                        <div class="item-price">
                                            @if($item->product_type_price == CGlobal::TYPE_PRICE_NUMBER && $item->product_price_sell > 0)
                                                @if($item->product_price_sell > 0)
                                                    <span class="amount-1">{{FunctionLib::numberFormat($item->product_price_sell)}}đ</span>
                                                @endif
                                                @if($item->product_price_market > 0 && $item->product_price_market > $item->product_price_sell)
                                                    <span class="amount-2">{{FunctionLib::numberFormat($item->product_price_market)}}đ</span>
                                                @endif
                                            @else
                                                <span class="amount-1">Liên hệ</span>
                                            @endif
                                        </div>
                                        <a href="{{URL::route('site.listProduct', array('name'=>strtolower(FunctionLib::safe_title($item->category_name)),'id'=>$item->category_id))}}" title="{{$item->category_name}}">{{$item->category_name}}</a>
                                        @if(!empty($userAdmin))
                                            <a href="{{URL::route('admin.productEdit',array('id' => $item->product_id))}}" style="color: red;" title="Sửa sản phẩm" target="_blank">(Sửa SP)</a>
                                        @endif
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        @endforeach
    @endif
</div>

