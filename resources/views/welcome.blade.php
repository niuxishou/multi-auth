<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
                height: 10vh;
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
                font-size: 50px;
            }
			.search{
				font-size:15px;
				text-align: center;
				padding-top:20px;
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
				background-color: #EEE;
			}
			.buttons2{
				width:480px;
				margin:0 auto;
			}
			.buttons2 ul{
				font-size:0;
			}
			.buttons2 ul li{
				font-size:14px;
				width:180px;
				margin:10px 10px 20px;
				display: inline-block;
				background-color: #EEE;
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
			select{
				width:130px;
				height:65px;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    左側にルーム・サロンのロゴ
                    @auth
                        0ポイント
                        <a href="{{ url('/home') }}">マイページ</a>
                    @else
                        <a href="signup">利用登録</a>
                        <a href="apply">スタイリストになる</a>
                        <a href="{{ route('login') }}">ログイン</a>
                    @endauth
                </div>
            @endif
		</div>
            <div class="content">
                <div class="title m-b-md">
                    あなたに合った<br>スタイリストが見つかる<br>ルーム・サロン<br>（背景に画像）
                </div>
                <form method="get" action="/search_result">
               {{ csrf_field() }}
               <input name="_method" type="hidden" value="PUT">
               <select name="pref">
               <option value="">都道府県で検索</option>
               <option value="東京都">東京都</option>
               <option value="神奈川県">神奈川県</option>
               <option value="埼玉県">埼玉県</option>
			   </select>
               <input name="action" id="submit_button" type="submit" value="検索">
			   </form>
                <div class="search">
                	<a href="search">スタイリストの詳細検索はこちらから</a>
                </div>
            </div>
        <div class="buttons" style="width:720px;margin:60px auto 20px;">
        	<ul>
        		<li>ルーム・サロンの特徴（テキストの上に画像）</li>
        		<li>使い方（テキストの上に画像）</li>
        		<li>料金について（テキストの上に画像）</li>
        	</ul>
        </div>
        <div class="workers">
                    <h2>新着スタイリスト（横並びで4人）</h2>
                    <ul>
                    @foreach ($worker_list as $worker)
                	   <li><img src="image/see1.jpeg" alt="プロフィール画像" width="200" height="133"><p><a href="show_stylist?worker_id={{$worker->id}}">{{$worker->name}}</a></p><p>{{$worker->pref}}{{$worker->address_1}}</p></li>
                	@endforeach
                	</ul>
        </div>
        <div class="workers">
                    <h2>カットが得意なスタイリスト（横並びで4人）</h2>
                    <ul>
                    @foreach ($worker_list as $worker)
                	   <li><img src="image/see1.jpeg" alt="プロフィール画像" width="200" height="133"><p><a href="show_stylist?worker_id={{$worker->id}}">{{$worker->name}}</a></p><p>{{$worker->pref}}{{$worker->address_1}}</p></li>
                	@endforeach
                	</ul>
        </div>
        <div class="buttons2">
        	<ul>
        		<li>会員登録について（テキストの左に画像）</li>
        		<li>利用規約（テキストの左に画像）</li>
        	</ul>
        </div>
        <div class="workers">
                    <h2>カラーが得意なスタイリスト（横並びで4人）</h2>
                    <ul>
                    @foreach ($worker_list as $worker)
                	   <li><img src="image/see1.jpeg" alt="プロフィール画像" width="200" height="133"><p><a href="show_stylist?worker_id={{$worker->id}}">{{$worker->name}}</a></p><p>{{$worker->pref}}{{$worker->address_1}}</p></li>
                	@endforeach
                	</ul>
        </div>
        <div class="workers">
                    <h2>パーマが得意なスタイリスト（横並びで4人）</h2>
                    <ul>
                    @foreach ($worker_list as $worker)
                	   <li><img src="image/see1.jpeg" alt="プロフィール画像" width="200" height="133"><p><a href="show_stylist?worker_id={{$worker->id}}">{{$worker->name}}</a></p><p>{{$worker->pref}}{{$worker->address_1}}</p></li>
                	@endforeach
                	</ul>
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
