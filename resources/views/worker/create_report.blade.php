<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理画面 | 施術後カルテ作成</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->

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
			.conversation{
				width:90%;
				margin:0 auto;
				padding:10px;
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
				width:90%;
				height:200px;
				font-size:14px;
				resize:none;
			}
			
			.card-body{
				font-size:13px;
			}
			tr{
				height:40px;
			}
			input[type="radio"]{
				margin-left:10px;
				padding-left:10px;
			}
			input[type="submit"]{
				width:80px;
				height:40px;
				font-size:15px;
			}
        </style>
    </head>
    <body>
  <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item nav-title">
                    <a class="nav-link">
                        登録関連
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/worker/edit_worker" class="nav-link">
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
                <a href="/worker/list_worker" class="nav-link active">
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
            <div class="card-header bold" style="font-size:25px;">{{ $order->user_name }}様の施述後カルテ作成</div>
            <div class="card-body">
                 <form method="POST" action="/worker/create_report?order_id={{ $order->id }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 <table>
                 	<tr><th>1.対応メニュー</th>
                 	<td>
                 	<input class="form-field" type="text" name="content_1" id="content_1" value="{{ old('content_1') }}" />
                 	</td></tr>
                 	<tr><th>2.対応時間</th>
                 	<td>
                 	<input class="form-field" type="text" name="content_2" id="content_2" value="{{ old('content_2') }}" />
                 	</td></tr>
                 	<tr><th>3.注意点</th>
                 	<td>
                 	<input class="form-field" type="text" name="content_3" id="content_3" value="{{ old('content_3') }}" />
                 	</td></tr>
                 	<tr><th>4.お客様からの要望</th>
                 	<td>
                 	<input class="form-field" type="text" name="content_4" id="content_4" value="{{ old('content_4') }}" />
					</td></tr>
					<tr><th>5.対応後写真</th><td><table><tr><th>右斜め後ろ</th><th>後ろ</th><th>左斜め後ろ</th><th>前</th></tr><tr><td><input class="form-field" type="file" name="content_5_path_1" id="content_5_path_1" /></td><td><input class="form-field" type="file" name="content_5_path_2" id="content_5_path_2" /></td><td><input class="form-field" type="file" name="content_5_path_3" id="content_5_path_3" /></td><td><input class="form-field" type="file" name="content_5_path_4" id="content_5_path_4" /></td></tr></table></td></tr>
                 </table><br><br>
                 <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="作成"></center>
				 </form>
            </div>
        </div>
    </body>
</html>