<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | スタイリストを探す</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
                height: 45vh;
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
			}
			.copy p{
				text-align: center;
				padding-bottom:15px;
			}
			.condition{
				width:960px;
				margin: 0 auto;
			}
			.condition ul{
				font-size:0;
				padding:0;
				margin: 0;
			}
			.condition h2{
				padding: 20px 0;
			}
			.condition ul li{
				padding:0;
				display:inline-block;
				width:100px;
				margin:20px;
				font-size:16px;
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

            <div class="content">
                <div class="title m-b-md">
                    スタイリスト検索（背景に画像）
                </div>
            </div>
        </div>
        <form method="get" action="/search_detail">
        {{ csrf_field() }}
        <div class="condition">
        	<h2>利用目的</h2>
        	<ul>
        		<li><input type="checkbox" name="content_1" value="カット"> カット</li>
        		<li><input type="checkbox" name="content_2" value="カラー"> カラー</li>
        		<li><input type="checkbox" name="content_3" value="パーマ"> パーマ</li>
        		<li><input type="checkbox" name="content_4" value="縮毛矯正"> 縮毛矯正</li>
        		<li><input type="checkbox" name="content_5" value="エクステ"> エクステ</li>
        		<li><input type="checkbox" name="content_5" value="ヘアセット"> ヘアセット</li>
        	</ul>
        </div>
        <div class="condition">
        	<h2>地域から探す</h2>
               <select name="pref">
               <option value="" style="width:120px;height:40px;">都道府県から探す</option>
               <option value="東京都">東京都</option>
               <option value="神奈川県">神奈川県</option>
               <option value="埼玉県">埼玉県</option>
			   </select>
               <input type="text" name="address_1" id="address_1" style="width:150px;height:40px;" placeholder="市区町村名">
        </div>
        <div class="condition">
        	<h2>対応可能な年代</h2>
              <input type="radio" name="age" value="20代">20代
              <input type="radio" name="age" value="30代">30代
              <input type="radio" name="age" value="40代">40代
              <input type="radio" name="age" value="50代">50代
              <input type="radio" name="age" value="60代">60代
        </div>
        <div class="condition">
        	<h2>フリーワード</h2>
               <input type="text" name="freeword" id="freeword" style="width:200px;height:40px;">
        </div>
        <center><input name="action" id="submit_button" type="submit" value="検索" style="margin:20px 0;"></center>
        </form>
        <div id="footer">
        	<div class="footer_contents">
        		<ul class="section1"><li>ダミー1</li><li>ダミー2</li><li>ダミー3</li><li>ダミー4</li></ul>
        	</div>
        	<div class="copy">
        		<p>©️Copyright ルーム・サロン All Rights Reserved.</p>
        	</div>
        </div>
    </body>
</html>
