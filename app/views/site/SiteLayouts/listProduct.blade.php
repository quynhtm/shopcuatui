<div class="container">
    <div class="main-view-post">
        <h1 class="title-head">
            <a title="Thời trang nữ" href="">{{$categoryName}}</a>
        </h1>
        <div class="list-link-cat">
            <ul>
                <li><a href="ao-so-mi-nu-483.html" title="Áo sơ mi nữ">Áo sơ mi nữ</a></li>
                <li><a href="ao-khoac-nu-484.html" title="Áo khoác nữ">Áo khoác nữ</a></li>
                <li><a href="quan-au-nu-485.html" title="Quần âu nữ">Quần âu nữ</a></li>
                <li><a href="quan-jean-nu-486.html" title="Quần jean nữ">Quần jean nữ</a></li>
                <li><a href="giay-dep-nu-487.html" title="Giày dép nữ">Giày dép nữ</a></li>
                <li><a href="balo-tui-xach-nu-488.html" title="Balo, túi xách nữ">Balo, túi xách nữ</a></li>
                <li><a href="dam-vay-nu-489.html" title="Đầm váy nữ">Đầm váy nữ</a></li>
                <li><a href="do-ngu-nu-490.html" title="Đồ ngủ nữ">Đồ ngủ nữ</a></li>
                <li><a href="ao-phong-nu-508.html" title="Áo phông nữ">Áo phông nữ</a></li>
                <li><a href="quan-ao-the-thao-nu-510.html" title="Quần áo thể thao nữ">Quần áo thể thao nữ</a></li>
                <li><a href="dong-ho-nu-519.html" title="Đồng hồ nữ">Đồng hồ nữ</a></li>
            </ul>
            <div class="click-more-view-cat"><i class="fa fa-angle-down"></i></div>
        </div>
        <div class="content-list-item ">
            @if($dataProductCate != null)
                <div class="content-list-item {{(FunctionLib::checkOS()) ? 'phone' : ''}}">
                    <ul class="data-tab tab-0 act">
                        @foreach($dataProductCate as $key=>$item)
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
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div style="clear: both">
                    {{$paging}}
                </div>
            @endif
        </div>
    </div>
</div>

