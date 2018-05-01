<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理画面 | カルテ作成</title>
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
			tr{
				height:30px;
			}
			input[type="radio"]{
				margin-left:10px;
				padding-left:10px;
			}
			input[type="submit"]{
				width:40px;
				height:20px;
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
                <a href="/worker/list_order" class="nav-link">
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
            <div class="card-header bold" style="font-size:25px;">{{ $karte->user_name }}様のカルテ編集</div>
            <div class="card-body">
                 <form method="POST" action="/worker/create_karte?user_id={{ $karte->user_id }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 <table>
                 	<tr><th>1.毛量</th>
                 	<td>
                 	<input type="radio" name="content_1" value="少なめ" @if($karte->content_1 == '少なめ') checked @endif>少なめ
                 	<input type="radio" name="content_1" value="普通" @if($karte->content_1 == '普通') checked @endif>普通
                 	<input type="radio" name="content_1" value="多め" @if($karte->content_1 == '多め') checked @endif>多め
                 	</td></tr>
                 	<tr><th>2.硬さ</th>
                 	<td>
                 	<input type="radio" name="content_2" value="軟らかめ" @if($karte->content_2 == '軟らかめ') checked @endif>軟らかめ
                 	<input type="radio" name="content_2" value="普通" @if($karte->content_2 == '普通') checked @endif>普通
                 	<input type="radio" name="content_2" value="硬め" @if($karte->content_2 == '硬め') checked @endif>硬め
                 	</td></tr>
                 	<tr><th>3.太さ</th>
                 	<td>
                 	<input type="radio" name="content_3" value="細め" @if($karte->content_3 == '細め') checked @endif>細め
                 	<input type="radio" name="content_3" value="普通" @if($karte->content_3 == '普通') checked @endif>普通
                 	<input type="radio" name="content_3" value="太め" @if($karte->content_3 == '太め') checked @endif>太め
                 	</td></tr>
                 	<tr><th>4.クセ</th>
                 	<td>
                 	<input type="radio" name="content_4" value="弱い" @if($karte->content_4 == '弱い') checked @endif>弱い
                 	<input type="radio" name="content_4" value="普通" @if($karte->content_4 == '普通') checked @endif>普通
                 	<input type="radio" name="content_4" value="強い" @if($karte->content_4 == '強い') checked @endif>強い
                 	</td></tr>
                 	<tr><th>5.カラー</th>
                 	<td>
                 	<input type="radio" name="content_5" value="入りやすい" @if($karte->content_5 == '弱い') checked @endif>入りやすい
                 	<input type="radio" name="content_5" value="普通" @if($karte->content_5 == '普通') checked @endif>普通
                 	<input type="radio" name="content_5" value="入りにくい" @if($karte->content_5 == '入りにくい') checked @endif>入りにくい
                 	</td></tr>
                 	<tr><th>6.パーマ</th>
                 	<td>
                 	<input type="radio" name="content_6" value="かかりやすい" @if($karte->content_6 == 'かかりやすい') checked @endif>かかりやすい
                 	<input type="radio" name="content_6" value="普通" @if($karte->content_6 == '普通') checked @endif>普通
                 	<input type="radio" name="content_6" value="かかりにくい" @if($karte->content_6 == 'かかりにくい') checked @endif>かかりにくい
                 	</td></tr>
                 	<tr><th>7.アレルギー</th>
                 	<td>
                 	<input type="radio" name="content_6" value="あり" @if($karte->content_7 == 'あり') checked @endif>あり
                 	<input type="radio" name="content_6" value="なし" @if($karte->content_7 == 'なし') checked @endif>なし
                 	</td></tr>
                 	<tr><th>9.接し方ポイント</th><td><input class="form-field" type="text" name="content_10" id="content_10" value="{{ $karte->content_10 }}" /></td></tr>
                 	<tr><th>10.その他気になったこと</th><td><input class="form-field" type="text" name="content_11" id="content_11" value="{{ $karte->content_11 }}" /></td></tr>
                 </table>
                 <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="作成"></center>
				 </form>
            </div>
        </div>
    </body>
</html>