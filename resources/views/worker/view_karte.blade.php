<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理画面 | カルテ閲覧</title>
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
                <a href="/worker/list_order" class="nav-link active">
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
            <div class="card-header">{{ $karte->user_name }}様のカルテ詳細</a></div>
            <div class="card-body">
                 @if ($karte->status == "初回")
                 <p><a href="create_karte?user_id={{ $karte->user_id }}">カルテを作成する</a></p>
                 <br>
                 @endif
                 @if ($karte->status == "記入済")
                 <p><a href="create_report?user_id={{ $karte->user_id }}">施述後のカルテを作成する</a></p>
                 <br>
                 @endif
                 @if ($karte->status != "初回")
                 <table>
                 	<tr><th>1.毛量</th><td>{{ $karte->content_1 }}</td></tr>
                 	<tr><th>2.硬さ</th><td>{{ $karte->content_2 }}</td></tr>
                 	<tr><th>3.太さ</th><td>{{ $karte->content_3 }}</td></tr>
                 	<tr><th>4.クセ</th><td>{{ $karte->content_4 }}</td></tr>
                 	<tr><th>5.カラー</th><td>{{ $karte->content_5 }}</td></tr>
                 	<tr><th>6.パーマ</th><td>{{ $karte->content_6 }}</td></tr>
                 	<tr><th>7.アレルギー</th><td>{{ $karte->content_7 }}</td></tr>
					<tr><th>8.カット前写真</th><td><table><tr><th>右斜め後ろ</th><th>後ろ</th><th>左斜め後ろ</th><th>前</th></tr><tr><td>{{ $karte->content_8_path }}</td><td>{{ $karte->content_8_path_2 }}</td><td>{{ $karte->content_9_path }}</td><td>{{ $karte->content_9_path_2 }}</td></tr></table></td></tr>
                 	<tr><th>9.接し方ポイント</th><td>{{ $karte->content_10 }}</td></tr>
                 	<tr><th>10.その他気になったこと</th><td>{{ $karte->content_11 }}</td></tr>
                 </table>
                 @endif
            </div>
        </div>
    </body>
</html>