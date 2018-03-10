<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理员注册</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin/register/form-elements.css">
    <link rel="stylesheet" href="/css/admin/register/style.css">

</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>银行招聘</strong>后台管理系统</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>管理员注册</h3>
                            <p>输入您的企业邮箱和密码</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="{{ url('/admin/register/register') }}" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">企业邮箱</label>
                                <input type="text" name="username" placeholder="企业邮箱..." class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="密码..." class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" class="btn">注册</button>
                        </form>
                        <div class="text-center has_account">
                            <span style="color: black">已有账号</span>&nbsp;&nbsp;
                            <a href="{{ url('admin/login/display') }}">请登录</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/admin/register/jquery.backstretch.min.js"></script>
<script src="/js/admin/register/scripts.js"></script>


</body>

</html>