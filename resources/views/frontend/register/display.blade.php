<html>
<head>
    <meta charset="UTF-8">
    <title>银行欢迎您</title>
    <link rel="stylesheet" href="/css/frontend/register/display.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/frontend/register/display.js"></script>
</head>
<body>
    <div class="container register-bar-bg">
        <span class="register-bar-turnright">
            <span class="glyphicon glyphicon-user"></span>
            &nbsp;
            <a href="http://bank.recruit.cn/frontend/login/display" class="register-color-white">登录</a>
        </span>
    </div>
    <div class="container register-main">
        <form class="form-horizontal register-form" id="form">
            <div class="form-group">
                <label class="col-sm-3 control-label">用户名</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="用户名" name="username">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">真实姓名</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="真实姓名" name="realname">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">电子邮件</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" placeholder="电子邮件" name="email">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">性别</label>
                <div class="col-sm-4">
                    <select class="form-control" name="gender">
                        <option value="0">男</option>
                        <option value="1">女</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">手机号码</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="手机号码" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">密码</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" placeholder="密码" name="password">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">确认密码</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" placeholder="确认密码" name="password_confirmation">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">简历类型</label>
                <div class="col-sm-4">
                    <select class="form-control" name="resume_type">
                        <option value="0">校园招聘简历</option>
                        <option value="1">社会招聘简历</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">证件类型</label>
                <div class="col-sm-4">
                    <select class="form-control" name="certificates_type">
                        <option value="0">身份证</option>
                        <option value="1">护照</option>
                        <option value="2">港澳身份证</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">证件号码</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="证件号码" name="certificates_number">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 register-button">
                    <button type="button" class="btn btn-primary col-sm-3" id="registerButton">注册</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>