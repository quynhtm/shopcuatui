    <div class="block_login_center">
        <div class="msg_support">
            <p class="title_support">Bạn cần hỗ trợ? Hãy gọi ngay:</p>
            <p class="phone_support">0913.922.986</p>
        </div>
        <div class="form_login">
            <div class="form_login_top">
                CMS Control
            </div>
            {{ Form::open(array('class'=>'form-signin')) }}
                <div class="form_login_content">
                    <span class="marginTop5 dangnhap">Đăng nhập</span>
                    @if(isset($error))
                        <div class="clear"></div>
                        <span class="float-L marginTop5 msg_error"> ** {{$error}}</span>
                    @endif

                    <div class="form_login_input marginTop10">
                        <div class="label_input">Tên đăng nhập</div>
                        <input type="text" class="login_input marginTop5" name="user_name" placeholder="Tên đăng nhập" @if(isset($username)) value="{{$username}}" @endif>

                        <div class="label_input marginTop10">Mật khẩu</div>
                        <input type="password" class="login_input marginTop5" name="user_password" placeholder="Mật khẩu">
                        <span class="float-L marginTop5">
                            <input type="checkbox" class="login_input_checkbox"><b class="remeber_account">Nhớ tài khoản</b>
                        </span>
                        <button type="submit" name="submit" class="button_login" >Đăng nhập</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>

