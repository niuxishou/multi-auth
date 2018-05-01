<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | 依頼一覧</title>
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
			.left5{
				margin-left:5%;
			}
			.row1{
				width:5%;
			}
			.row3{
				width:20%;
			}
			.row4{
				width:20%;
			}
			.row5{
				width:10%;
			}
			.row6{
				width:15%;
			}
			.row7{
				width:10%;
			}
			.row8{
				width:20%;
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
					<li><a href="edit_user">登録情報編集</a></li>
					<li class="bold">依頼一覧</a></li>
               		<li><a href="point_history">ポイント履歴</a></li>
			        <li><a href="point_purchase">ポイント購入</a></li>
               	</ul>
               </nav>           
           
            <div class="card-header">依頼一覧</div>
            <div class="card-body">
               <p>「詳細」をクリックすると、依頼情報を閲覧・編集できます。</p>
                <table id="account_list" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="row1">ID</th>
                        <th class="row3">担当スタイリスト名</th>
                        <th class="row4">依頼内容</th>
                        <th class="row5">使用ポイント</th>
                        <th class="row6">依頼日</th>
                        <th class="row7">ステータス</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order_list as $order)
                        <tr>
                            <td><a href="/view_order?order_id={{$order->id}}">詳細</a></td>
                            <td>{{$order->worker_name}}</td>
                            <td>
                            <ul>
                            @if ($order->content_1 != "")<li>{{$order->content_1}}</li>@endif
                            @if ($order->content_2 != "")<li>{{$order->content_2}}</li>@endif
                            @if ($order->content_3 != "")<li>{{$order->content_3}}</li>@endif
                            @if ($order->content_4 != "")<li>{{$order->content_4}}</li>@endif
                            @if ($order->content_5 != "")<li>{{$order->content_5}}</li>@endif
                            @if ($order->content_6 != "")<li>{{$order->content_6}}</li>@endif
                            </ul>
                            </td>
                            <td>{{$order->points}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
