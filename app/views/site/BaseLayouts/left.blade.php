<div class="col-left">
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Giới thiệu</a>
         </span>
		</div>
		<div class="list">
			<ul>
				<li><a href="" title="Giới thiệu chung">Giới thiệu chung</a></li>
				<li><a href="" title="Sứ mạng và Định hướng phát triển">Sứ mạng và Định hướng phát triển</a></li>
				<li><a href="" title="Đảng ủy">Đảng ủy</a></li>
				<li><a href="" title="Hội đồng Trường">Hội đồng Trường</a></li>
				<li><a href="" title="Công đoàn">Công đoàn</a></li>
				<li><a href="" title="Đoàn thanh niên - Hội Sinh viên">Đoàn thanh niên - Hội Sinh viên</a></li>
				<li><a href="" title="Cơ cấu tổ chức">Cơ cấu tổ chức</a></li>
				<li><a href="" title="Báo cáo Ba công khai">Báo cáo Ba công khai</a></li>
			</ul>
		</div>
	</div>
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Tin tức</a>
         </span>
		</div>
		<div class="list">
			<ul>
				<li><a href="" title="Lịch công tác tuần">Lịch công tác tuần</a></li>
				<li><a href="" title="Văn bản chỉ đạo, điều hành của Bộ Giáo dục và Đào tạo">Văn bản chỉ đạo, điều hành của Bộ Giáo dục và Đào tạo</a></li>
				<li><a href="" title="Tin tuyển sinh">Tin tuyển sinh</a></li>
				<li><a href="" title="Hoạt động đào tạo">Hoạt động đào tạo</a></li>
				<li><a href="" title="Hoạt động đoàn thể">Hoạt động đoàn thể</a></li>
				<li><a href="" title="Hoạt động của các trường Mầm non thực hành">Hoạt động của các trường Mầm non thực hành</a></li>
			</ul>
		</div>
	</div>
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Đào tạo</a>
         </span>
		</div>
		<div class="list">
			<ul>
				<li><a href="" title="Thông báo">Thông báo</a></li>
				<li><a href="" title="Trình độ cao đẳng">Trình độ cao đẳng</a></li>
				<li><a href="" title="Trình độ Trung cấp chuyên nghiệp">Trình độ Trung cấp chuyên nghiệp</a></li>
				<li><a href="" title="Bồi dưỡng thường xuyên">Bồi dưỡng thường xuyên</a></li>
				<li><a href="" title="Phối hợp đào tạo">Phối hợp đào tạo</a></li>
				<li><a href="" title="Văn bản pháp qui">Văn bản pháp qui</a></li>
			</ul>
		</div>
	</div>
	@if(sizeof($arrBannerLeft) > 0)
		@foreach($arrBannerLeft as $item)
			@if($item->banner_image != '')
				<div class="item-box">
					<a @if($item->banner_is_rel == CGlobal::LINK_NOFOLLOW) rel="nofollow" @endif @if($item->banner_is_target == CGlobal::BANNER_TARGET_BLANK) target="_blank" @endif href="@if($item->banner_link != '') {{$item->banner_link}} @else javascript:void(0) @endif" title="{{$item->banner_name}}">
						<img src="{{ThumbImg::thumbImageBannerNormal($item->banner_id,$item->banner_parent_id, $item->banner_image, CGlobal::sizeImage_1000,CGlobal::sizeImage_200, $item->banner_name,true,true)}}" alt="{{$item->banner_name}}" />
					</a>
				</div>
			@endif
		@endforeach
	@endif
</div>