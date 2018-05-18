<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> {{config('app.name')}} {{config('app.codename')}} | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" type="text/css" href="{{URL::to('css/google-fonts.css')}}">
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{URL::to('packages/node_modules/admin-lte/bootstrap/css/bootstrap.min.css')}}">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('packages/node_modules/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::to('packages/node_modules/ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('packages/node_modules/admin-lte/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::to('packages/node_modules/admin-lte/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>{{$configuracao['system_name']}}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">faça o login para iniciar sua sessão</p>

    <form method="POST" action="{{ route('login') }}">
     {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control"  placeholder="email" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
         <input id="password" type="password" placeholder="senha" class="form-control" name="password" required>
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        
       
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12">
          <a href="{{URL::to('/password/reset')}}" class="btn btn-info btn-block btn-flat">Esqueci minha senha</a>
        </div>
      </div>

    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{URL::to('packages/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::to('packages/node_modules/admin-lte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::to('packages/node_modules/admin-lte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function ()
  {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });


    $.get('/public-configuration', function(data){

     bootbox.confirm('aaaaaaaaaaaaaaaaaaaaaaaaaa', function(confirmation)
     {
        if(confirmation == true)
        {
          console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaa");          
        }
     });

    });

  });
</script>
</body>
</html>






