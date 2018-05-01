<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | 登録情報変更</title>
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

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
			
			.full-height{
				height:60px;
			}
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			.apply{
				width:95%;
				max-width:960px;
				padding-top:150px;
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
				padding:15px 0 30px;
			}
			
			.apply p{
				text-align: center;
				margin-bottom: 50px;
			}
			.apply p a{
				text-align: center;
				padding:12.5px 30px;
				border-radius: 20px;
				font-size:15px;
				color:#FFF;
				background-color: #153ED1;
			}
			.apply p a:hover{
				text-decoration: none;
			}
			
			.card{
				border: none;
				width:95%;
				max-width: 960px;
				margin:0 auto;
			}
			.card-header{
				background-color: #FFF;
				font-size:20px;
				text-align: center;
			}
			.card-body{
				font-size: 13px;
			}
			.card nav{
				width:100%;
				margin: 0 auto;
				text-align: center;
			}
			.card li {
				font-size:13px;
				display: inline;
				margin:0 5%;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                        <a href="{{ url('/home') }}">マイページ</a>
                        <a href="{{ url('/logout') }}">ログアウト</a>
                </div>
            @endif
		</div>

            <div class="card">
               <nav>
               	<ul>
					<li class="bold">登録情報編集</li>
					<li><a href="list_order">依頼一覧</a></li>
               		<li><a href="point_history">ポイント履歴</a></li>
               		<li><a href="point_purchase">ポイント購入</a></li>
               	</ul>
               </nav>
               
                <div class="card-header">登録情報の閲覧・編集</div>
                <div class="card-body">
                    <form method="POST" action="/edit_user" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">お名前</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field" placeholder="姓" type="text" value="{{ $user->name_1 }}" name="name_1" id="name_1" />
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field" placeholder="名" type="text" value="{{ $user->name_2 }}" name="name_2" id="name_2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">フリガナ</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field" placeholder="セイ" type="text" value="{{ $user->name_kana_1 }}" name="name_kana_1" id="name_kana_1" />
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field" placeholder="メイ" type="text" value="{{ $user->name_kana_2 }}" name="name_kana_2" id="name_kana_2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required" style="vertical-align:middle;">住所（郵便番号）<span class="hissu">※</span><br>※ハイフンなし7桁</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field" type="text" value="{{ $user->post }}" name="post" id="post" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','pref','address_1');" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（都道府県）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" value="{{ $user->pref }}" name="pref" id="pref" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（市区町村）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" value="{{ $user->address_1 }}" name="address_1" id="address_1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（番地）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" value="{{ $user->address_2 }}" name="address_2" id="address_2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（建物・ビル名）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" value="{{ $user->address_3 }}" name="address_3" id="address_3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title">生年月日</div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            {{ $user->birthday_1 }} 年 {{ $user->birthday_2 }} 月 {{ $user->birthday_3 }}日
			            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">メールアドレス</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" value="{{ $user->email }}" name="email" id="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">電話番号</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" value="{{ $user->tel }}" name="tel" id="tel" />
                        </div>
                    </div>
                    <div class="form-group center">
                        <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="更新"></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
