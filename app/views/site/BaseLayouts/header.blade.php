<div class="head-banner">
	<div class="container">
		<div class="flash">
	        @if(sizeof($arrBannerHead) > 0)
				<?php $i=0; ?>
				@foreach($arrBannerHead as $item)
					<?php $i++; ?>
					@if($i == 1)
						@if($item->banner_image != '')
							<a class="banner-img" @if($item->banner_is_rel == CGlobal::LINK_NOFOLLOW) rel="nofollow" @endif @if($item->banner_is_target == CGlobal::BANNER_TARGET_BLANK) target="_blank" @endif href="@if($item->banner_link != '') {{$item->banner_link}} @else javascript:void(0) @endif" title="{{$item->banner_name}}">
								<img src="{{ThumbImg::thumbImageBannerNormal($item->banner_id,$item->banner_parent_id, $item->banner_image, CGlobal::sizeImage_1000,CGlobal::sizeImage_200, $item->banner_name,true,true)}}" alt="{{$item->banner_name}}" />
							</a>
						@endif
					@endif
				@endforeach
			@endif
	    </div>
		<div class="bg-menu">
			<div class="container">
				<ul class="menu">
					<li><a class="aline" href="{{URL::route('site.home')}}">Trang chủ</a></li>
					@if(!empty($menuCategoriessAll))
                        <?php $i=1; ?>
						@foreach($menuCategoriessAll as $cat)
							@if($i <= 7)
								@if($cat['category_show_top'] == CGlobal::status_show)
                                    <?php $i++; ?>
									<li><a class="aline @if(isset($catid) && $catid == $cat['category_id']) act @endif" href="{{FunctionLib::buildLinkCategory($cat['category_id'], $cat['category_name'])}}" title="{{$cat['category_name']}}">{{$cat['category_name']}}</a></li>
								@endif
							@endif
						@endforeach
					@endif
					<li><a href="{{URL::route('site.pageContact')}}" title="Liên hệ">Liên hệ</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>