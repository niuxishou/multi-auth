<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | 依頼一覧</title>
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
				font-size:14px;
			}
			.nav-title a{
				font-weight:800;
				padding-left:4px !important;
			}
			.nav-item a{
				padding-left:12px;
			}

			.card{
				font-size: 13px;
			}

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			.row1{
				width:5%;
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
				width:10%;
			}
			.row6{
				width:10%;
			}
			.row7{
				width:10%;
			}
			.row8{
				width:20%;
			}
			ul li{
				list-style: none;
				padding-left:0;
			}
			
			.flex-center{
				height:60px;
			}
			.top-right{
				float: right;
				margin:20px 5% 0 0;
			}
			.top-right a{
				vertical-align: middle;
				color: #888;
				font-size:14px;
			}
			
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}
			
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="/stylistadmin/logout">ログアウト</a>
            </div>
        </div>
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item nav-title">
                    <a class="nav-link">
                        採用関連
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/stylistadmin/list_applicant" class="nav-link">
                        応募一覧
                    </a>
                </li>
            </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a href="/stylistadmin/home" class="nav-link">
                    ダッシュボード
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a class="nav-link">
                    各種情報
                </a>
            </li>
            <li class="nav-item">
                <a href="/stylistadmin/list_worker" class="nav-link">
                    スタイリスト一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/stylistadmin/list_order" class="nav-link active">
                    依頼一覧
                </a>
            </li>
        </ul>
    </nav>

        <div class="card">
            <div class="card-header bold" style="font-size:25px;">依頼一覧</div>
            <div class="card-body">
               <p>「詳細」をクリックすると、依頼情報を閲覧・編集できます。</p>
               
               <p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
               <form method="post" action="/stylistadmin/list_order">
               {{ csrf_field() }}
               <input type="text" name="user_name" placeholder="ユーザー名" value="{{ $user_name }}">
               <input type="text" name="worker_name" placeholder="担当スタイリスト名" value="{{ $worker_name }}">
               <select name="status">
                 <option value="">---</option>
                  <option value="依頼受付" @if($status=='依頼受付') selected @endif>依頼受付</option>
                  <option value="完了" @if($status=='完了') selected @endif>完了</option>
                  <option value="キャンセル" @if($status=='キャンセル') selected @endif>キャンセル</option>
               </select>
               <input name="action" id="submit_button" type="submit" value="検索">
			   </form>
                <table id="account_list" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="row1"></th>
                        <th class="row2">依頼ユーザー名</th>
                        <th class="row3">担当スタイリスト名</th>
                        <th class="row4">依頼内容</th>
                        <th class="row5">ポイント移動</th>
                        <th class="row6">依頼日付</th>
                        <th class="row7">ステータス</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order_list as $order)
                        <tr>
                            <td><a href="/stylistadmin/view_order?order_id={{$order->id}}">詳細</a></td>
                            <td>{{$order->user_name}}</td>
                            <td>{{$order->worker_name}}</td>
                            <td><ul><li>{{$order->content_1}}</li><li>{{$order->content_2}}</li><li>{{$order->content_3}}</li><li>{{$order->content_4}}</li><li>{{$order->content_5}}</li><li>{{$order->content_6}}</li></ul></td>
                            <td>{{$order->points}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$order_list->appends(Request::except('page'))->links()}}
            </div>
            <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
        </div>
        
    </body>
</html>
