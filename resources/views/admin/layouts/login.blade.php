<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập trang quản trị</title>

    <link href="{{ asset('front-end/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/startmin.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vui lòng đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" role="form">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $item)
                                        {{$item}}
                                    @endforeach
                                </div>
                            @endif
                            @if (session('thongbao'))
                                <div class="alert alert-danger">
                                        {{session('thongbao')}}
                                </div>
                            @endif
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text"
                                        autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password"
                                        value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Ghi nhớ đăng nhập lần sau
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Đăng nhập">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('front-end/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-end/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-end/admin/js/metisMenu.min.js') }}"></script>

    <script src="{{ asset('front-end/admin/js/startmin.js') }}"></script>
</body>

</html>
