<div class="container">
    <div class="main-view-post">
        <h1 class="title-head">
            <a title="@if(isset($arrDepart[$product->depart_id])) {{$arrDepart[$product->depart_id]}}@endif" href="">@if(isset($arrDepart[$product->depart_id])) {{$arrDepart[$product->depart_id]}} @else Sản phẩm @endif</a>
        </h1>
        <div class="row">
            <div class="left-slider-img" id="gallery">
                <div class="img-main-view">
                    <a href="{{ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $product->product_id, $product->product_image, CGlobal::sizeImage_800)}}" title="{{$product->product_name}}">
                        <img src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $product->product_id, $product->product_image, CGlobal::sizeImage_800)}}" alt="{{$product->product_name}}">
                    </a>
                </div>
                @if(isset($product_image_other) && !empty($product_image_other))
                <div class="arr-img">
                    <div id="slick">
                        @foreach($product_image_other as $key => $imgOther)
                        <div class="item-one-img-view">
                            <a href="{{ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $product->product_id, $imgOther, CGlobal::sizeImage_800)}}" title="{{$product->product_name}}" tabindex="0">
                                <img src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $product->product_id, $imgOther, CGlobal::sizeImage_400)}}" title="{{$product->product_name}}" alt="{{$product->product_name}}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#slick").slick({
                                dots: false,
                                infinite: true,
                                slidesToShow: 5,
                                slidesToScroll: 3
                            });
                        });
                    </script>
                </div>
                @endif
            </div>
            <div class="center-des-product">
                <h1>{{$product->product_name}}</h1>
                @if(isset($userAdmin) && !empty($userAdmin))
                    <a href="{{URL::route('admin.productEdit',array('id' => $product->product_id))}}" style="color: red;" title="Sửa sản phẩm" target="_blank">(Sửa sản phẩm này)</a>
                @endif
                @if($product->product_type_price == CGlobal::TYPE_PRICE_NUMBER && $product->product_price_sell > 0)
                    @if($product->product_price_market > 0 && $product->product_price_market > $product->product_price_sell)
                        <div class="row-price">
                            <div class="lbl-row">Giá thị trường:</div>
                            <div class="price-origin">{{FunctionLib::numberFormat($product->product_price_market)}}đ</div>
                        </div>
                    @endif
                    @if($product->product_price_sell > 0)
                        <div class="row-price">
                            <div class="lbl-row lbl-price-sale">Giá bán:</div>
                            <div class="price-sale">{{FunctionLib::numberFormat($product->product_price_sell)}}<span class="td-border">đ</span></div>
                        </div>
                    @endif
                @else
                    <div class="row-price">
                        <div class="lbl-row lbl-price-sale">Giá bán:</div>
                        <div class="price-sale">Liên hệ</div>
                    </div>
                @endif
                <div class="row-price" style="clear: both">
                    <div class="lbl-row lbl-price-sale"><a href="{{URL::route('site.listProduct', array('name'=>strtolower(FunctionLib::safe_title($product->category_name)),'id'=>$product->category_id))}}" title="{{$product->category_name}}">{{$product->category_name}}</a></div>
                </div>

                <div class="features-point">
                    <div class="lbl-point">Mô tả sản phẩm</div>
                    <div class="des-point">
                        {{stripslashes($product->product_sort_desc)}}
                    </div>
                    <div class="box-promotion" style="display: none">
                        <div class="lbl-point">Thông tin khuyến mãi</div>
                        <div class="box-content-promotion"></div>
                    </div>
                </div>
            </div>
            <div class="right-des-product">
                <div class="content-right-product">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-like" data-href="{{FunctionLib::buildLinkDetailProduct($product->product_id, $product->product_name, $product->category_name)}}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true">
                    </div>
                </div>
                <div class="content-right-product">
                    <div class="order-number">
                        <label for="buy-number">Số lượng</label>
                        <select class="sl-num" id="buy-num" name="buy-num">
                            {{$optionNumberBuy}}
                        </select>
                    </div>
                    <div id="btnBuy" dataid="{{$product->product_id}}" class="buynow btn">Mua ngay</div>
                </div>
                <div class="content-right-product">
                    <div class="order-number-phone">
                        <p><b>Đặt nhanh qua điện thoại</b></p>
                        <div class="number-phone">
                            <div class="fa fa-phone"></div>
                            <span>0985.10.10.26 - 0913.922.986</span>
                        </div>
                        <p><a href="javascript:void(0)" title="Shopcuatui">Shopcuatui.com.vn</a></p>
                        <p><b>Thông tin liên hệ: </b></p>
                        <p>nguyenduypt86@gmail.com</p>
                        <p>CT2A-Khu đô thị Nghĩa Đô-Cầu Giấy-Hà Nội</p>
                    </div>
                    <div class="link-fast">
                        <p><a href="javascript:void(0)">Giới thiệu về chúng tôi</a></p>
                        <p><a href="javascript:void(0)">Chính sách vận chuyển hàng</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="line-box line-box-cat vip">
            <div class="cate-box">
                <div class="inner-cate-box hide-text-over">
                    <h2 class="parent-cate act">
                        <a href="javascript:void(0)">Chi tiết sản phẩm</a>
                    </h2>
                </div>
            </div>
            <div class="content-bottom-content-view">
                {{stripslashes($product->product_content)}}
            </div>
        </div>
        @if($arrProductSame != null)
            <div class="line-box line-box-cat vip">
                <div class="cate-box">
                    <div class="inner-cate-box hide-text-over">
                        <h2 class="parent-cate act">
                            <a href="javascript:void(0)" datacatid="0" datatype="vip">Sản phẩm liên quan</a>
                        </h2>
                    </div>
                </div>
                <div class="content-list-item {{(FunctionLib::checkOS()) ? 'phone' : ''}}">
                    <ul class="data-tab tab-0 act">
                        @foreach($arrProductSame as $key=>$item)
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
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery('#gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Tải ảnh...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1],
            },
            image: {
                tError: 'không thể tải ảnh!',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>{{CGlobal::web_name}}</small>';
                }
            }
        });
    });
</script>