<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | 応募スタイリスト一覧</title>
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
			nav{
				font-size: 14px;
			}
			.nav-title a{
				font-weight:800;
				padding-left:4px !important;
			}
			.nav-item a{
				padding-left:12px;
			}
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
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
			
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}

            .m-b-md {
                margin-bottom: 30px;
            }
			nav{
				font-size: 14px;
			}
			table{
				margin-top:15px;
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
				width:10%;
			}
			.row5{
				width:15%;
			}
			.row6{
				width:5%;
			}
			.row7{
				width:25%;
			}
			.row8{
				width:15%;
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
                    <a href="/stylistadmin/list_applicant" class="nav-link active">
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
                <a href="/stylistadmin/list_order" class="nav-link">
                    依頼一覧
                </a>
            </li>
        </ul>
    </nav>

        <div class="card">
            <div class="card-header bold" style="font-size:25px;">応募スタイリスト一覧</div>
            <div class="card-body">
               <p>IDのリンクをクリックすると、応募者情報を変更できます。</p>
	       <p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
               <form method="post" action="/stylistadmin/list_applicant">
               {{ csrf_field() }}
               <input type="text" name="name" placeholder="名前" value="{{ $name }}">
               <input type="text" name="pref" placeholder="都道府県" value="{{ $pref }}">
               <input type="text" name="address_1" placeholder="市区町村" value="{{ $address_1 }}">
               <select name="status">
                 <option value="">---</option>
                  <option value="応募" @if($status=='応募') selected @endif>応募中</option>
                  <option value="面接合格" @if($status=='面接合格') selected @endif>面接合格</option>
                  <option value="面接不合格" @if($status=='面接不合格') selected @endif>面接不合格</option>
                  <option value="保留" @if($status=='保留') selected @endif>保留</option>
                  <option value="ワーカー登録済" @if($status=='ワーカー登録済') selected @endif>ワーカー登録済</option>
               </select>
               <input name="action" id="submit_button" type="submit" value="検索">
			   </form>
                <table id="account_list" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="row2">名前</th>
                        <th class="row3">フリガナ</th>
                        <th class="row4">都道府県</th>
                        <th class="row5">市区町村</th>
                        <th class="row6">年齢</th>
                        <th class="row7">応募日付</th>
                        <th class="row8">ステータス</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($applicant_list as $applicant)
                        <tr>
                            <td><a href="/stylistadmin/edit_applicant?applicant_id={{$applicant->id}}">{{$applicant->name}}</a></td>
                            <td>{{$applicant->name_kana}}</td>
                            <td>{{$applicant->pref}}</td>
                            <td>{{$applicant->address_1}}</td>
                            <td>{{$applicant->age}}</td>
                            <td>{{$applicant->created_at}}</td>
                            <td>{{$applicant->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $applicant_list->appends(Request::except('page'))->links() }}
            </div>
            <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
        </div>
    </body>
</html>
