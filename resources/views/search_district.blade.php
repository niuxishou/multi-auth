<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | 検索結果</title>

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
			.showstylists{
				width:960px;
				margin: 0 auto;
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
				margin:20px;
				background-color: #E6E6E6;
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
                        <a href="{{ url('signup') }}">利用登録</a>
                        <a href="{{ url('apply') }}">スタイリストになる</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{$worker_dis}}スタイリスト（背景に画像）
                </div>
            </div>
        </div>
        <div class="condition">
        </div>
        <div class="showstylists">
        	<ul>
        	@foreach ($worker_list as $worker)
        		<li>画像<br>{{$worker->name}}<br><a href="../search_result/{{$worker->pref}}">{{$worker->pref}}</a> &gt; {{$worker->address_1}}</li>
        	@endforeach
        	</ul>
        </div>
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