<!DOCTYPE html>
<html lang="ja"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ルーム・サロン | 会員ログイン</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
		
		.card{
			margin-top:50px;
		}
	</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">会員ログイン</div>

                <div class="card-body">
                    <form method="POST" action="/login">
                        {{ csrf_field() }}
                        
                        @if ($errors->has('email'))
                           <p style="font-size:13px;color:#CD4446;text-align: center;">{{ $errors->first('email') }}</p>
                        @endif
                        

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                               
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                              
                            </div>
                        </div>
                        
                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="height:30px;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> パスワードを記憶
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ログイン
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>