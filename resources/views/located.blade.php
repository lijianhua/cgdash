<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>欢迎加入</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--         <!&#45;&#45; 最新版本的 Bootstrap 核心 CSS 文件 &#45;&#45;> -->
<!--         <link rel="stylesheet" -->
<!--         href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" -->
<!--         integrity="sha384&#45;BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" -->
<!--         crossorigin="anonymous"> -->
<!--         <!&#45;&#45; 最新的 Bootstrap 核心 JavaScript 文件 &#45;&#45;> -->
<!--         <script -->
<!-- src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" -->
<!-- integrity="sha384&#45;Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" -->
<!-- crossorigin="anonymous"></script> -->
        <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-R80DC0KVBO4GSTw+wZ5x2zn2pu4POSErBkf8/fSFhPXHxvHJydT0CSgAP2Yo2r4I"
        crossorigin="anonymous">
        <script
src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
integrity="sha384-3xciOSDAlaXneEmyOo0ME/2grfpqzhhTcM4cE32Ce9+8DW/04AGoTACzQpphYGYe"
        crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
            <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">欢迎加入</a>
            </nav>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- 创建文章表单 -->
            <form class="form-horizontal" action='/joined' method='post'>
                {{ csrf_field()  }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                    <input type="text" name='userName' class="form-control"
                    id="userName" placeholder="姓名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">手机</label>
                    <div class="col-sm-10">
                    <input type="tel" class="form-control"
                    id="telPhone" placeholder="手机号" name='telPhone'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2
                        control-label">联系地址</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"
                    id="address" name='address' placeholder="联系地址">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2
                        control-label">开户银行</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"
                    id="bankName" name='bankName' placeholder="开户银行">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2
                        control-label">银行账号</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control"
                    id="bankAccount" name='bankAccount' placeholder="银行账号">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2
                        control-label">推荐人</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"
                    id="referrer" name='referrer' placeholder="推荐人">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn
                            btn-outline-primary">提&nbsp;&nbsp;交</button>
                </div>
            </form>
        </div>
    </body>
</html>
