<html>
   <head>
       <meta charset="UTF-8">
       <title>银行欢迎您</title>
       <link rel="stylesheet" href="/css/frontend/login/display.css">
       <script src="/js/jquery-3.2.1.min.js"></script>
       <script src="/js/frontend/login/display.js"></script>
   </head>
   <body>
   <div class="login">
       <div class="message">银行欢迎您</div>
       <div id="darkbannerwrap"></div>
       <form method="post" id="loginForm">
           <input name="email" placeholder="邮箱地址" type="text">
           <hr class="hr15">
           <input name="password" placeholder="密码" type="password">
           <hr class="hr15">
           <input name="cpt" placeholder="验证码" type="text">
           <div class="div_captcha">
               <img src="{{ url('frontend/register/captcha') }}" id="image">
               <span style="margin-left: 30px">
                   看不清？
                   <a href="javascript:void(0)" id="changeCaptcha">换一张</a>
               </span>

           </div>
           <input value="登录" style="width:100%; margin-top: 5px" type="button" id="loginButton">
           <hr class="hr20">
           <a href="http://bank.recruit.cn/frontend/register/display">注册</a>
       </form>
   </div>
   <script src="/js/frontend/login/display.js"></script>
   </body>
</html>