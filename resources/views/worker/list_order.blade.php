<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理サイト | 依頼一覧</title>
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
			
			nav{
			   font-size: 14px;
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
			.row1{
				width:15%;
			}
			.row2{
				width:15%;
			}
			.row3{
				width:15%;
			}
			.row4{
				width:15%;
			}
			.row5{
				width:15%;
			}
			.row6{
				width:15%;
			}
			.row7{
				width:5%;
			}
			.row8{
				width:20%;
			}
			ul li{
				list-style: none;
				padding-left:0;
			}
			.card-body{
				font-size: 13px;
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
            <div class="card-header bold" style="font-size:25px;">依頼一覧</div>
            <div class="card-body">
                <table id="account_list" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="row1"></th>
                        <th class="row2">依頼ユーザー名</th>
                        <th class="row4">依頼内容</th>
                        <th class="row5">ポイント移動</th>
                        <th class="row6">依頼日時</th>
                        <th class="row7">ステータス</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order_list as $order)
                        <tr>
                            <td><a href="/worker/view_order?order_id={{$order->id}}">詳細を閲覧</a></td>
                            <td>{{$order->user_name}}</td>
                            <td>
                            <ul>
                            @if ($order->content_1 != "")<li>{{$order->content_1}}</li>@endif
                            @if ($order->content_2 != "")<li>{{$order->content_2}}</li>@endif
                            @if ($order->content_3 != "")<li>{{$order->content_3}}</li>@endif
                            @if ($order->content_4 != "")<li>{{$order->content_4}}</li>@endif
                            @if ($order->content_5 != "")<li>{{$order->content_5}}</li>@endif
                            @if ($order->content_6 != "")<li>{{$order->content_6}}</li>@endif
                            </ul></td>
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