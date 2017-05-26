<div class="main-content-inner">
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="{{URL::route('admin.dashboard')}}">Home</a>
			</li>
			<li class="active">Quản lý Thông tin SEO</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="panel panel-info">
					{{ Form::open(array('method' => 'GET', 'role'=>'form')) }}
					<div class="panel-body">
						<div class="form-group col-lg-3">
							<label for="province_id">Từ khóa</label>
							<input type="text" class="form-control input-sm" id="infor_sale_name" name="infor_sale_name" placeholder="Tên người bán" @if(isset($search['infor_sale_name']) && $search['infor_sale_name'] != '')value="{{$search['infor_sale_name']}}"@endif>
						</div>
					</div>
					<div class="panel-footer text-right">
						@if($is_root || $permission_full ==1 || $permission_create == 1)
							<span class="">
                            <a class="btn btn-danger btn-sm" href="{{URL::route('admin.infosaleEdit')}}">
								<i class="ace-icon fa fa-plus-circle"></i>
								Thêm mới
							</a>
                        </span>
						@endif
						<span class="">
                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                        </span>
					</div>
					{{ Form::close() }}
				</div>
				@if(sizeof($data) > 0)
					<div class="span clearfix"> @if($total >0) Có tổng số <b>{{$total}}</b> item @endif </div>
					<br>
					<table class="table table-bordered table-hover">
						<thead>
						<tr>
							<th width="2%" class="text-center">STT</th>
							<th width="1%" class="text-center"><input id="checkAll" type="checkbox"></th>
							<th width="10%">Tiêu đề</th>
							<th width="10%">SĐT</th>
							<th width="5%" class="text-center">Email</th>
							<th width="10%" class="text-center">Địa chỉ</th>
							<th width="5%" class="text-center">UID gán</th>
							<th width="5%">Action</th>
						</tr>
						</thead>
						<tbody>
						@foreach($data as $k=>$item)
							<tr>
								<td class="text-center">{{$k+1}}</td>
								<td class="text-center"><input class="checkItem" name="checkItem[]" value="{{$item['info_id']}}" type="checkbox"></td>
								<td>{{$item['infor_sale_name']}}</td>
								<td>{{$item['infor_sale_phone']}}</td>
								<td class="text-center">{{$item['infor_sale_mail']}}</td>
								<td class="text-center">{{$item['infor_sale_address']}}</td>
								<td class="text-center">{{$item['infor_sale_uid']}}</td>
								<td>
									<a href="{{URL::route('admin.infosaleEdit',array('id' => $item['infor_sale_id']))}}" title="Sửa item"><i class="fa fa-edit fa-2x"></i></a>
									@if($is_root || $permission_full ==1 || $permission_delete == 1)
										&nbsp;&nbsp;&nbsp;
										<a href="javascript:void(0);" onclick="Admin.deleteItem({{$item['infor_sale_id']}},16)" title="Xóa Item"><i class="fa fa-trash fa-2x"></i></a>
									@endif
									<span class="img_loading" id="img_loading_{{$item['infor_sale_id']}}"></span>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="text-right">
						{{$paging}}
					</div>
				@else
					<div class="alert">
						Không có dữ liệu
					</div>
					@endif
			</div>
		</div>
	</div><!-- /.page-content -->
</div>