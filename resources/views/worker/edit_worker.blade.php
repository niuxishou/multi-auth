<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | スタイリスト情報変更</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

        <!-- Styles -->
        <style>
			
			@font-face {
               font-family: "Yu Gothic";
               src: local("Yu Gothic Medium");
               font-weight: 400;
            }
			
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: "Yu Gothic", "游ゴシック", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
                font-weight: 100;
                margin: 0;
            }
			
			a:hover{
				opacity:0.7;
			}
			
			nav{
				font-size: 14px;
			}
			.nav-title a{
				font-weight:800;
				padding-left:4px !important;
			}
			.nav-item a{
				padding-left:12px;
			}

            .content {
                text-align: center;
            }
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}

            .title {
                font-size: 84px;
            }


            .m-b-md {
                margin-bottom: 30px;
            }
			
			.apply{
				font-size: 14px;
			}
			.apply h3{
				color:#F4A643;
				padding:15px 0 15px 15px;
				border:2px solid #F4A643;
				margin-bottom:20px;
			}
			.apply p{
				font-size:14px;
				padding:10px 0 10px 15px;
			}
			.hissu{
				color:#EC070B;
			}
			.form-field{
				width:100%;
			}
			.form-group{
				padding:15px 0 40px;
			}
			.card-body{
				font-size: 13px;
			}
			
			.btn-success{
				width:60px;
				height:30px;
				font-size: 15px;
			}
			.flex-center{
				height:60px;
			}
			.top-right{
				float: right;
				margin:20px 5% 0 0;
			}
			.top-right a{
				vertical-align: middle;
				color: #888;
				font-size:14px;
			}
			
			.alert{
				font-size: 13px;
			}
			.error{
				border-color: #EE1114;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="/worker/logout">ログアウト</a>
            </div>
        </div>
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item nav-title">
                    <a class="nav-link">
                        登録関連
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/worker/edit_worker" class="nav-link active">
                        登録情報の閲覧・編集
                    </a>
                </li>
            </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a href="/worker/home" class="nav-link">
                    ダッシュボード
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a class="nav-link">
                    業務関連
                </a>
            </li>
            <li class="nav-item">
                <a href="/worker/schedule" class="nav-link">
                    スケジュール管理
                </a>
	    </li>
            <li class="nav-item">
                <a href="/worker/list_order" class="nav-link">
                    依頼一覧
                </a>
	    </li>
            <li class="nav-item">
                <a href="/worker/list_review" class="nav-link">
                    レビュー一覧
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a class="nav-link">
                    ポイント関連
                </a>
            </li>
            <li class="nav-item">
                <a href="/worker/point_history" class="nav-link">
                    ポイント履歴
                </a>
			</li>
            <li class="nav-item">
                <a href="/worker/point_purchase" class="nav-link">
                    ポイント購入
                </a>
            </li>
        </ul>
    </nav>
 <div class="card">
    <div class="card-header bold" style="font-size:25px;">{{ $worker->name }}さんの登録情報を編集</div>
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
    	    </div>
        @endif
        <form method="POST" action="/worker/edit_worker" accept-charset="UTF-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">お名前</div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <input class="form-field{{ $errors->has('name_1') ? ' error' : '' }}" placeholder="姓" type="text" value="{{ $worker->name_1 }}" name="name_1" id="name_1" />
                </div>
                <div class="col-sm-5 col-md-5">
                    <input class="form-field{{ $errors->has('name_2') ? ' error' : '' }}" placeholder="名" type="text" value="{{ $worker->name_2 }}" name="name_2" id="name_2" />
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">フリガナ</div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <input class="form-field{{ $errors->has('name_kana_1') ? ' error' : '' }}" placeholder="セイ" type="text" value="{{ $worker->name_kana_1 }}" name="name_kana_1" id="name_kana_1" />
                </div>
                <div class="col-sm-5 col-md-5">
                    <input class="form-field{{ $errors->has('name_kana_2') ? ' error' : '' }}" placeholder="メイ" type="text" value="{{ $worker->name_kana_2 }}" name="name_kana_2" id="name_kana_2" />
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required" style="vertical-align:middle;">住所（郵便番号）<span class="hissu">※</span><br>※ハイフンなし7桁</div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <input class="form-field{{ $errors->has('post') ? ' error' : '' }}" type="text" value="{{ $worker->post }}" name="post" id="post" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','pref','address_1');" />
                </div>
            </div>
            <br><hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">住所（都道府県）</div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <input class="form-field{{ $errors->has('pref') ? ' error' : '' }}" type="text" value="{{ $worker->pref }}" name="pref" id="pref" />
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">住所（市区町村）</div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <input class="form-field{{ $errors->has('address_1') ? ' error' : '' }}" type="text" value="{{ $worker->address_1 }}" name="address_1" id="address_1" />
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">住所（番地）</div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <input class="form-field{{ $errors->has('address_2') ? ' error' : '' }}" type="text" value="{{ $worker->address_2 }}" name="address_2" id="address_2" />
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">住所（建物・ビル名）</div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <input class="form-field{{ $errors->has('address_3') ? ' error' : '' }}" type="text" value="{{ $worker->address_3 }}" name="address_3" id="address_3" />
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">性別</div>
                </div>
                <div class="col-sm-4 col-md-4">
                    {{ $worker->gender }}
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title">生年月日</div>
                </div>
                <div class="col-sm-6 col-md-6">
                    {{ $worker->birthday_1 }} 年 {{ $worker->birthday_2 }} 月 {{ $worker->birthday_3 }}日
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">メールアドレス</div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <input class="form-field{{ $errors->has('email') ? ' error' : '' }}" type="text" value="{{ $worker->email }}" name="email" id="email" />
                </div>
            </div>
            <!-- 
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">パスワード</div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <input class="form-field" type="password" name="password" id="password" />
                </div>
            </div>
             -->
            <hr>
            <div class="form-group">
                <div class="col-sm-3 col-md-3">
                    <div class="form-layout-title form-style-required">電話番号</div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <input class="form-field{{ $errors->has('tel') ? ' error' : '' }}" type="text" value="{{ $worker->tel }}" name="tel" id="tel" />
                </div>
            </div>
            <hr>
            <div class="form-group center">
                <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="更新"></center>
            </div>
        </form>
	</div>
    <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
</div>
            
</body>
</html>
