<html>
<head>
    <meta charset="UTF-8">
    <title>银行欢迎您</title>
    <link rel="stylesheet" href="/css/frontend/register/display.css">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/frontend/register/display.js"></script>
</head>
<body>
    <div class="register_body">
         <div class="register_content">
             <div class="register_info">
                 <h3 class="text-center">欢迎注册</h3>
                 <form method="post" id="form">
                     <input type="text" class="input_style email" placeholder="邮箱地址"
                            name="email">
                     <input type="password" class="input_style password" placeholder="密码"
                            name="password">
                     <input type="password" class="input_style confirm_password" placeholder="确认密码"
                            name="password_confirmation">
                     <input type="text" class="input_style code" placeholder="验证码" name="cpt">
                     <div class="div_captcha">
                         <img src="{{ url('frontend/register/captcha') }}" id="image">
                         <span style="margin-left: 30px">
                             看不清？
                             <a href="javascript:void(0)" id="changeCaptcha">换一张</a>
                         </span>

                     </div>
                     <input type="button" class="register_btn" value="注册" id="registerButton">
                 </form>
                 <p class="has_account">
                     已有账号？
                     <a href="http://bank.recruit.cn/frontend/login/display">立即登录</a>
                 </p>
             </div>
         </div>
    </div>
</body>
</html>