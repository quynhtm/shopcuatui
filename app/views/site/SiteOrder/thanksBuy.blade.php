<div class="container mb">
	<div class="post-page">
		<div class="content-post-info-user">
			<h1 class="title-head changeinfo">
				<a href="{{URL::route('site.thanksBuy')}}" title="ĐƠN HÀNG CỦA BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG">ĐƠN HÀNG CỦA BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG</a>
			</h1>
			<div class="content-thanks-order">
				Ban quản trị website sẽ liên hệ với bạn để xác thực thông tin. Cảm ơn bạn đã mua hàng! 
			</div>
		</div>
	</div>
	@if($arrProductSame != null)
		<div class="line-box line-box-cat vip">
			<div class="cate-box">
				<div class="inner-cate-box hide-text-over">
					<h2 class="parent-cate act">
						<a href="javascript:void(0)" datacatid="0" datatype="vip">Bạn có thể quan tâm</a>
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
								</div>

							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif
</div>