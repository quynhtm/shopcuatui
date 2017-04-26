<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1 class="text-italic">
                            <span class="red">CMS</span>
                            <span class="white" id="id-text2">Control Panel</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">&copy;{{CGlobal::web_name}}</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger line-title-form ">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        Vui lòng nhập thông tin
                                    </h4>

                                    <div class="space-6"></div>
                                    @if(isset($error))
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endif
                                    {{ Form::open(array('class'=>'form-signin')) }}
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="user_name" placeholder="Tên đăng nhập"  @if(isset($username)) value="{{$username}}" @endif/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="user_password" placeholder="Mật khẩu" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                {{--<label class="inline">--}}
                                                    {{--<input type="checkbox" class="ace" />--}}
                                                    {{--<span class="lbl"> Remember Me</span>--}}
                                                {{--</label>--}}

                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Login</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    {{ Form::close() }}
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->
                    </div><!-- /.position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<div class="block_login_center">
    <div class="block_login_top">
        <span class="float-R marginTop10 marginRight30">
            <a href="javascript:void(0);" id="zam-btn-signin">Đăng nhập</a>
        </span>
        <span class="float-R marginTop10 marginRight30">Hỗ trợ (9:00 - 17:00) : (08) 4458 1371</span>
    </div>
    <div class="msg_support">
        <p class="title_support">Bạn cần hỗ trợ? Hãy gọi ngay:</p>
        <p class="phone_support">(08) 4444 9999</p>
    </div>
    <div class="form_login">
        <div class="form_login_top">
            <i class="imge_logo"></i>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            <div class="form_login_content">
                <span class="float-L marginTop5 dangnhap">Đăng nhập</span>
                @if(Session::has('error'))
                    <div class="clear"></div>
                    <span class="float-L marginTop5 msg_error"> ** {{ Session::get('error') }}</span>
                @endif
                <div class="form_login_input marginTop10">
                    <div class="label_input">Tên đăng nhập</div>
                    <input type="email" class="login_input marginTop5" name="email" placeholder="Tên đăng nhập" value="{{ old('email') }}">

                    <div class="label_input marginTop10">Mật khẩu</div>
                    <input type="password" class="login_input marginTop5" name="password" placeholder="Mật khẩu">
                <span class="float-L marginTop5">
                    <input type="checkbox" class="login_input_checkbox"><b class="remeber_account">Nhớ tài khoản</b>
                </span>

                    <button type="submit" name="submit" class="button_login" >Đăng nhập</button>

                <span class="block_note marginTop5">
                   <hr class="ngang">
                    <span class="note_login">&nbsp;&nbsp;&nbsp;hoặc&nbsp;&nbsp;&nbsp;</span>
                </span>
                    <button type="button" name="submit" class="button_login_google" >Đăng nhập bằng Google</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="block_login_bottom">
    <span class="float-R marginTop30 marginRight100 text-right">
        Email: zamba@vccorp <br/>
        Địa chỉ: Tầng 21, tòa nhà 24T, Hapulico số 1 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội
    </span>

    <span class="float-L marginTop30 marginLeft100 text-left">
       <i class="imge_logo"></i>
    </span>
</div>
