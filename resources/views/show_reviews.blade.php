<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | スタイリストのレビュー</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="fullcalendar.css" />
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
			
			a:hover{
				opacity:0.7;
			}

            .full-height {
                height: 15vh;
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
				padding-top:40px;
            }

            .title {
                font-size: 30px;
            }
			.search{
				font-size:15px;
				text-align: center;
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
			
			.workers{
				margin:0 auto;
				width:95%;
				max-width:960px;
			}
			.workers h2{
				text-align:left;
			}
			.buttons{
				margin:0 auto;
				width:95%;
				max-width:840px;
			}
			.workers ul{
				font-size:0;
			}
			.workers ul li{
				font-size:15px;
				width:200px;
				margin:10px 10px 20px;
				display: inline-block;
			}
			.buttons ul{
				font-size:0;
			}
			.buttons ul li{
				font-size:14px;
				width:180px;
				margin:10px 10px 20px;
				display: inline-block;
			}
			
			#footer{
				background-color:#CCC;
			}
			.footer_contents{
				width: 960px;
				margin:0 auto;
			}
			.section1{
				padding-top:20px;
				padding-bottom:80px;
				font-size:13px;
				display:inline-block;
			}
			.section2{
				padding-top:20px;
				padding-bottom:80px;
				margin-left:40px;
				font-size:13px;
				display:inline-block;
				vertical-align: top;
			}
			.section3{
				padding-top:20px;
				padding-bottom: 80px;
				margin-left:40px;
				font-size:15px;
				display:inline-block;
				vertical-align: top;
			}
			.copy p{
				text-align: center;
				padding-bottom:15px;
			}
			.showstylists{
				width:960px;
				margin: 0 auto;
			}
			.showstylists:after{
				display:block;
				content:"";
				clear:both;
			}
			.showstylists ul{
				font-size:0;
				padding:0;
				margin: 0;
			}
			.showstylists ul li{
				padding:0;
				display:inline-block;
				width:440px;
				margin:5px 20px;
				font-size:16px;
			}
			.left{
				width:320px;
				float:left;
				margin-right:20px;
			}
			.right{
				width:600px;
				float:left;
			}
			
			.review{
				border:1px solid #AAA;
				border-radius: 4px;
				margin-bottom:40px;
				margin-top:20px;
			}
			.re1{
				display: inline-block;
				width:15%;
				padding-left:2%;
				margin-right:4%;
				vertical-align: top;
			}
			.re1 img{
				width:80px;
				height:80px;
				border-radius: 50%;
				margin-top:20px;
			}
			.re2{
				display: inline-block;
				width:70%;
				vertical-align: top;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('home') }}">マイページ</a>
                    @else
                        <a href="signup">利用登録</a>
                        <a href="apply">スタイリストになる</a>
                    @endauth
                </div>
            @endif
        </div>
        <div class="showstylists">
            <div class="left">
            	<img src="image/see1.jpeg" style="width:100%;">
            	<div style="background-color:#E6E6E6;">
            		<h4>スタイリスト基本情報</h4>
            		<p>対応可能年代：20代〜40代</p>
            		<p>受注回数：1回</p>
            	</div>
            </div>
            <div class="right">
               <h3 style="margin-bottom:10px;">田中花子さんのレビュー一覧</h3>
               @foreach ($review_list as $review)
               <hr>
               <div class="re1"><img src="image/see1.jpeg"></div>
               <div class="re2"><p>{{ $review->date }}&nbsp;{{ $review->rate }}</p><p>{{ $review->content }}</p></div>
               @endforeach
               <br><br><br>
            </div>
        </div>
        <div id="footer">
        	<div class="footer_contents">
				<div class="section1"><h3>サービス一覧</h3><ul><li>カット</li><li>カラー</li><li>パーマ</li><li>縮毛矯正</li><li>エクステ</li><li>ヘアセット</li></ul></div>
       	        <div class="section2"><h3>ルーム・サロンについて</h3><ul><li>ルーム・サロンとは</li><li>使い方</li><li>料金について</li><li>会員登録について</li><li>利用規約</li></ul></div>
       	        <div class="section3">右側に何か追加したい（FBなど）</div>
        	</div>
        	<div class="copy">
        		<p>©️Copyright ルーム・サロン All Rights Reserved.</p>
        	</div>
        </div>
    </body>
</html>
