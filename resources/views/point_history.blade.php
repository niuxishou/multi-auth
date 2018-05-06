<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | ポイント履歴</title>
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
			.left5{
				margin-left:5%;
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
               		<li class="bold">ポイント履歴</li>
					<li><a href="{{ url('/point_purchase') }}">ポイント購入</a></li>
               	</ul>
               </nav>
                <div class="card-header">ポイント履歴</div>
                <div class="card-body">
                	<p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
                	@if($msg=="")
                     <table id="account_list" class="table table-striped">
                        <thead>
                        <tr>
                            <th class="row1">ポイント加算・減算日</th>
                            <th class="row3">内容</th>
                            <th class="row4">ポイント増減</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($point_list as $point)
                            <tr>
                                <td>{{ $point->updated_at }}</td>
                                <td>{{ $point->pay_way }}</td>
                                <td>{{ $point->buy_points }}</td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                   @endif
            </div>
        </div>
    </body>
</html>