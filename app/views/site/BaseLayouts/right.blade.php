<div class="col-right">
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Tuyển sinh</a>
         </span>
		</div>
		<div class="list">
			<ul>
				<li><a href="" title="Trình độ cao đẳng">Trình độ cao đẳng</a></li>
				<li><a href="" title="Trình độ Trung cấp chuyên nghiệp">Trình độ Trung cấp chuyên nghiệp</a></li>
				<li><a href="" title="Các khóa ngắn hạn">Các khóa ngắn hạn</a></li>
				<li><a href="" title="Tra cứu điểm tuyển sinh">Tra cứu điểm tuyển sinh</a></li>
			</ul>
		</div>
	</div>
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Nghiên cứu khoa học</a>
         </span>
		</div>
		<div class="list">
			<ul>
				<li><a href="" title="Nghiên cứu khoa học">Nghiên cứu khoa học</a></li>
				<li><a href="" title="Hợp tác Quốc tế">Hợp tác Quốc tế</a></li>
			</ul>
		</div>
	</div>
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Tốt nghiệp-Cựu sinh viên</a>
         </span>
		</div>
		<div class="list">
			<ul>
				<li><a href="" title="Tra cứu văn bằng chứng chỉ">Tra cứu văn bằng chứng chỉ</a></li>
				<li><a href="" title="Khảo sát tình trạng việc làm">Khảo sát tình trạng việc làm</a></li>
			</ul>
		</div>
	</div>
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Đoàn TN - Hội SV</a>
         </span>
		</div>
		<div class="list">
			<ul>
				<li><a href="" title="Thông tin hoạt động">Thông tin hoạt động</a></li>
			</ul>
		</div>
	</div>
	<div class="item-box">
		<div class="top-box">
         <span>
         <a href="">Liên kết</a>
         </span>
		</div>
		<div class="list">
			<div class="title-select">» Cơ quan Đảng - Nhà nước</div>
			<select name="link" class="selectLink">
				<option>--Liên kết---</option>
				<option>ĐH QG Hà Nội</option>
				<option>ĐH Bách Khoa</option>
			</select>
			<div class="title-select">» Các trường Đại học</div>
			<select name="link" class="selectLink">
				<option>--Liên kết---</option>
				<option>ĐH QG Hà Nội</option>
				<option>ĐH Bách Khoa</option>
			</select>
			<div class="title-select">» Các website khác</div>
			<select name="link" class="selectLink">
				<option>--Liên kết---</option>
				<option>ĐH QG Hà Nội</option>
				<option>ĐH Bách Khoa</option>
			</select>
		</div>
	</div>
	@if(sizeof($arrBannerRight) > 0)
		@foreach($arrBannerRight as $item)
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