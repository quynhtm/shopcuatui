<div class="container">
    <div class="main-view-post">
        <h1 class="title-head">
            <a title="Thời trang nữ" href="">{{$categoryName}}</a>
        </h1>
        @if(isset($dataCate) && !empty($dataCate))
        <div class="list-link-cat">
            <ul>
                @foreach($dataCate as $cat_id=>$valu)
                    <li>
                        <a href="{{URL::route('site.listProductCatWithDepart', array('name'=>strtolower(FunctionLib::safe_title($valu['nameCat'])),'id'=>$cat_id,'depart_id'=>$valu['depart_id']))}}" title="{{$valu['nameCat']}}">{{$valu['nameCat']}}({{$valu['count']}})</a>
                    </li>
                @endforeach
            </ul>
            <div class="click-more-view-cat"><i class="fa fa-angle-down"></i></div>
        </div>
        @endif
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
                <div style="clear: both">
                    {{$paging}}
                </div>
            @endif
        </div>
    </div>
</div>

