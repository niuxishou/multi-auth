<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | レビュー投稿</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery.raty.js"></script>
        <script type="text/javascript" src="../jquery.raty.css"></script>

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
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
    	    .full-height{
    	    	height:60px;
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
			nav{
				font-size: 14px;
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
			.card nav li {
				font-size:13px;
				display: inline;
				margin:0 5%;
			}
			.form-field{
				width:100%;
			}
			.form-group{
				padding:15px 0 40px;
			}
			.conversation{
				width:90%;
				margin:0 auto;
				padding:10px 10px 0 10px;
				margin-bottom:10px;
				border:1px solid #111;
			}
			.conversation h6{
				font-size:14px;
			}
			.conversation h6 strong{
				font-size:12px;
				margin-left:10px !important;
			}
			.conversation p{
				font-size:14px;
				padding:0;
			}
			textarea{
				margin: 20px auto 40px;
				width:100%;
				height:200px;
				font-size:14px;
				resize:none;
			}
			ul{
				padding:0;
			}
			ul li{
				list-style: none;
				padding-left:0;
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
                <li><a href="{{ url('/edit_user') }}">登録情報編集</a></li>
                <li><a href="{{ url('/list_order') }}">依頼一覧</a></li>
                <li><a href="{{ url('/point_history') }}">ポイント履歴</a></li>
                <li><a href="{{ url('/point_purchase') }}">ポイント購入</a></li>
            </ul>
            </nav>           
           
            <div class="card-header">{{ $order->worker_name }}さんのレビューを投稿</div>
	    <div class="card-body">
	    	<p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
                  <form method="POST" action="create_review/?order_id={{ $order->id }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="star"></div>
                            <input type="hidden" name="rate" id="rate">
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#star').raty({
                                	click: function(score, evt) {
              						  $("#rate").val(score);
              					    }    
                                });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">本文</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <textarea name="content" id="content"></textarea>
                        </div>
                    </div>
                    <div class="form-group center">
						<center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="送信"></center>
                    </div>
			    </form>
            </div>
        </div>
    </body>
</html>