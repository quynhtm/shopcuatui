<div class="container">
    <div class="main-view-post">
        <h1 class="title-head">
            <a title="Thời trang nữ" href="">@if(isset($arrDepart[$product->depart_id])) {{$arrDepart[$product->depart_id]}} @else Sản phẩm @endif</a>
        </h1>
        <div class="row">
            <div class="left-slider-img">
                <div class="img-main-view">
                    <a href="#" title="{{$product->product_name}}">
                        <img src="{{ThumbImg::getImageThumb(CGlobal::FOLDER_PRODUCT, $product->product_id, $product->product_image, CGlobal::sizeImage_800)}}" alt="{{$product->product_name}}">
                    </a>
                </div>
                @if(isset($product_image_other) && !empty($product_image_other))
                <div class="arr-img">
                    <div id="slick">
                        @foreach($product_image_other as $key => $imgOther)
                        <div class="item-one-img-view">
                            <a href="#" title="{{$product->product_name}}" tabindex="0">
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

                <div class="features-point">
                    <div class="lbl-point">Mô tả sản phẩm</div>
                    <div class="des-point">
                        {{$product->product_sort_desc}}
                    </div>
                    <div class="box-promotion" style="display: none">
                        <div class="lbl-point">Thông tin khuyến mãi</div>
                        <div class="box-content-promotion">Mua 2 chai giảm thêm 5%</div>
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
                    <div id="buttonFormBuySubmit" data-pid="{{$product->product_id}}" class="buynow btn">Mua ngay</div>
                </div>
                <div class="content-right-product">
                    <div class="order-number-phone">
                        <p><b>Đặt nhanh qua điện thoại</b></p>
                        <div class="number-phone">
                            <div class="fa fa-phone"></div>
                            <span>0913922986</span>
                        </div>
                        <p><a href="" title="Shop: Siêu thị gia đình">Siêu thị gia đình</a></p>
                        <p><b>Thông tin liên hệ: </b></p>
                        <p>nguyenduypt86@gmail.com</p>
                        <p>Việt Hưng - Long Biên - Hà Nội</p>
                    </div>
                    <div class="link-fast">
                        <p><a href="#gioi-thieu-shop">Giới thiệu Shop</a></p>
                        <p><a href="#chinh-sach-van-chuyen">Chính sách vận chuyển</a></p>
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
                {{$product->product_content}}
            </div>
        </div>
    </div>
</div>

