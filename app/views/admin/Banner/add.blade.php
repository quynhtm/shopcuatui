<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li><a href="{{URL::route('admin.bannerView')}}"> Banner quảng cáo</a></li>
            <li class="active">@if($id > 0)Cập nhật banner @else Tạo mới banner @endif</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content marginTop30">
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                {{Form::open(array('method' => 'POST','role'=>'form','files' => true))}}
                @if(isset($error))
                    <div class="alert alert-danger" role="alert">
                        @foreach($error as $itmError)
                            <p>{{ $itmError }}</p>
                        @endforeach
                    </div>
                @endif
                <div style="float: left;width: 60%">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="name" class="control-label">Tên banner <span class="red"> (*) </span></label>
                        <input type="text" placeholder="Tên banner" id="banner_name" name="banner_name"  class="form-control input-sm" value="@if(isset($data['banner_name'])){{$data['banner_name']}}@endif">
                    </div>
                </div>
                <div class="col-sm-3" style="display: none">
                    <div class="form-group">
                        <label for="name" class="control-label">BannerId show ảnh</label>
                        <input type="text" placeholder="Banner parent show ảnh" id="banner_parent_id" name="banner_parent_id"  class="form-control input-sm" value="@if(isset($data['banner_parent_id'])){{$data['banner_parent_id']}}@endif">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name" class="control-label">Link URL</label>
                        <input type="text" placeholder="url banner" id="banner_link" name="banner_link"  class="form-control input-sm" value="@if(isset($data['banner_link'])){{$data['banner_link']}}@endif">
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Page quảng cáo</label>
                        <div class="form-group">
                            <select name="banner_page" id="banner_page" class="form-control input-sm">
                                {{$optionPage}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Loại quảng cáo</label>
                        <div class="form-group">
                            <select name="banner_type" id="banner_type" class="form-control input-sm">
                                {{$optionTypeBanner}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Mở tab mới?</label>
                        <div class="form-group">
                            <select name="banner_is_target" id="banner_is_target" class="form-control input-sm">
                                {{$optionTarget}}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4" style="display: none">
                    <div class="form-group">
                        <label for="name" class="control-label">Vị trí hiển thị</label>
                        <div class="form-group">
                            <select name="banner_position" id="banner_position" class="form-control input-sm">
                                {{$optionPosition}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-4" style="display: none">
                    <div class="form-group">
                        <label for="name" class="control-label">Danh mục quảng cáo</label>
                        <div class="form-group">
                            <select name="banner_category_id" id="banner_category_id" class="form-control input-sm">
                                {{$optionCategory}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="display: none">
                    <div class="form-group">
                        <label for="name" class="control-label">Nofollow</label>
                        <div class="form-group">
                            <select name="banner_is_rel" id="banner_is_rel" class="form-control input-sm">
                                {{$optionRel}}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Thứ tự hiển thị</label>
                        <input type="text" placeholder="Thứ tự hiển thị" id="banner_order" name="banner_order"  class="form-control input-sm" value="@if(isset($data['banner_order'])){{$data['banner_order']}}@endif">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Trạng thái</label>
                        <div class="form-group">
                            <select name="banner_status" id="banner_status" class="form-control input-sm">
                                {{$optionStatus}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Thời gian chạy QC </label>
                        <div class="form-group">
                            <select name="banner_is_run_time" id="banner_is_run_time" class="form-control input-sm">
                                {{$optionRunTime}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Ngày bắt đầu</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="banner_start_time" name="banner_start_time"  data-date-format="dd-mm-yyyy" value="@if(isset($data['banner_start_time']) && $data['banner_start_time'] > 0){{date('d-m-Y',$data['banner_start_time'])}}@endif">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Ngày kết thúc</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="banner_end_time" name="banner_end_time"  data-date-format="dd-mm-yyyy" value="@if(isset($data['banner_end_time']) && $data['banner_end_time'] > 0){{date('d-m-Y',$data['banner_end_time'])}}@endif">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                </div>

                <div style="float: left;width: 40%">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <a href="javascript:;"class="btn btn-primary" onclick="Admin.uploadOneImages(3);">Upload ảnh </a>
                            <input name="image_primary" type="hidden" id="image_primary" value="@if(isset($data['banner_image'])){{$data['banner_image']}}@endif">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <!--hien thi anh-->
                        <div id="block_img_upload">
                            @if(isset($data['banner_image']) && $data['banner_image']!= '')
                                <img src="{{ ThumbImg::getImageThumb(CGlobal::FOLDER_BANNER, $id, $data['banner_image'], CGlobal::sizeImage_300, '', true, CGlobal::type_thumb_image_banner, false)}}">
                                <div class="clearfix"></div>
                                <!--<a href="javascript: void(0);" onclick="Common.removeImageItem({{$id}},'{{$data['banner_image']}}',3);">Xóa ảnh</a>-->
                            @endif
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>
                <div class="form-group col-sm-12 text-left">
                    <a class="btn btn-warning" href="{{URL::route('admin.bannerView')}}"><i class="fa fa-reply"></i> Trở lại</a>
                    <button  class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu lại</button>
                </div>
                <input type="hidden" id="id_hiden" name="id_hiden" value="{{$id}}"/>
                {{ Form::close() }}
                <!-- PAGE CONTENT ENDS -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.page-content -->
</div>


<!--Popup upload ảnh-->
<div class="modal fade" id="sys_PopupUploadImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload ảnh</h4>
            </div>
            <div class="modal-body">
                <form name="uploadImage" method="post" action="#" enctype="multipart/form-data">
                <div class="form_group">
                    <div id="sys_mulitplefileuploader" class="btn btn-primary">Upload ảnh</div>
                    <div id="status"></div>

                    <div class="clearfix"></div>
                    <div class="clearfix" style='margin: 5px 10px; width:100%;'>
                        <div id="div_image"></div>
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>
<!--Popup upload ảnh-->

<script>
    $(document).ready(function(){
        var checkin = $('#banner_start_time').datepicker({ });
        var checkout = $('#banner_end_time').datepicker({ });
    });
</script>
