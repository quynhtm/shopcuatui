<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li><a href="{{URL::route('admin.info')}}"> Danh sách thông tin người bán</a></li>
            <li class="active">@if($id > 0)Cập nhật thông tin người bán @else Tạo mới thông tin người bán @endif</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content marginTop30">
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                {{Form::open(array('method' => 'POST','role'=>'form','files' => true))}}
                @if(isset($error) && is_array($error))
                    <div class="alert alert-danger" role="alert">
                        @foreach($error as $itmError)
                            <p>{{ $itmError }}</p>
                        @endforeach
                    </div>
                @else
                    @if($error != '')
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                    @endif
                @endif
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>Tên người bán</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="infor_sale_name" value="@if(isset($data['infor_sale_name'])){{$data['infor_sale_name']}}@endif">
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>SĐT</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="infor_sale_phone" @if(isset($data['infor_sale_phone']))value="{{$data['infor_sale_phone']}}"@endif>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>Email</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="infor_sale_mail" @if(isset($data['infor_sale_mail']))value="{{$data['infor_sale_mail']}}"@endif>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>Địa chỉ</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="infor_sale_address" @if(isset($data['infor_sale_address']))value="{{$data['infor_sale_address']}}"@endif>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>Skype</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="infor_sale_skype" @if(isset($data['infor_sale_skype']))value="{{$data['infor_sale_skype']}}"@endif>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>Gán cho userid</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="infor_sale_uid" @if(isset($data['infor_sale_uid']))value="{{$data['infor_sale_uid']}}"@endif>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>Số tài khoản</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <textarea class="form-control input-sm" name="infor_sale_sotaikhoan">@if(isset($data['infor_sale_sotaikhoan'])){{stripslashes($data['infor_sale_sotaikhoan'])}}@endif</textarea>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <i>Thông tin vận chuyển</i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <textarea class="form-control input-sm" name="infor_sale_vanchuyen">@if(isset($data['infor_sale_vanchuyen'])){{stripslashes($data['infor_sale_vanchuyen'])}}@endif</textarea>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-sm-2 text-left"></div>
                <div class="form-group col-sm-10 text-left">
                    <button  class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu lại</button>
                </div>
                <input type="hidden" id="id_hiden" name="id_hiden" value="{{$id}}"/>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('infor_sale_sotaikhoan');
    CKEDITOR.replace('infor_sale_vanchuyen');
</script>