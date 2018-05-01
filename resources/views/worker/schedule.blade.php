<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | スケジュール一覧・登録</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
        
        <!-- JavaScripts -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/i18n/jquery-ui-i18n.min.js"></script>
        
        <script>
  $(function() {
	$.datepicker.setDefaults($.datepicker.regional['ja']);
    $("#datepicker").datepicker({
		dateFormat: "yy-mm-dd",
	});
  });
</script>

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
			.card-body{
				font-size: 13px;
			}
			
			h3{
				font-size: 16px;
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
                <a href="/worker/schedule" class="nav-link active">
                    スケジュール管理
                </a>
			</li>           
            <li class="nav-item">
                <a href="/worker/list_order" class="nav-link">
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
                <div class="card-header bold" style="font-size:25px;">スケジュール一覧・編集</div>
                <div class="card-body">
                 <ul>
                 　 @foreach ($schedule_list as $schedule)
                 	<li>{{ $schedule->date }} &nbsp; {{ $schedule->start_time }}〜{{ $schedule->end_time }} &nbsp; <a href="edit_schedule?id={{ $schedule->id }}">編集</a></li>
                 	@endforeach
                 </ul>
                <h3>新規スケジュール作成</h3>
                <form method="POST" action="/worker/schedule" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">日付を選択</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field" placeholder="対応可能な日付" type="text" name="date" id="datepicker" />
                        </div>
                    </div> 
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">対応可能な時刻</div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <select class="form-field" type="text" name="start_time" id="start_time" />
                               <option value="9:00" @if(old('condition')=='9:00') selected @endif>9:00</option>
                               <option value="9:30" @if(old('condition')=='9:30') selected @endif>9:30</option>
                               <option value="10:00" @if(old('condition')=='10:00') selected @endif>10:00</option>
                               <option value="10:30" @if(old('condition')=='10:30') selected @endif>10:30</option>
                               <option value="11:00" @if(old('condition')=='11:00') selected @endif>11:00</option>
                               <option value="11:30" @if(old('condition')=='11:30') selected @endif>11:30</option>
                               <option value="12:00" @if(old('condition')=='12:00') selected @endif>12:00</option>
                               <option value="12:30" @if(old('condition')=='12:30') selected @endif>12:30</option>
                               <option value="13:00" @if(old('condition')=='13:00') selected @endif>13:00</option>
                               <option value="13:30" @if(old('condition')=='13:30') selected @endif>13:30</option>
                               <option value="14:00" @if(old('condition')=='14:00') selected @endif>14:00</option>
                               <option value="14:30" @if(old('condition')=='14:30') selected @endif>14:30</option>
                               <option value="15:00" @if(old('condition')=='15:00') selected @endif>15:00</option>
                               <option value="15:30" @if(old('condition')=='15:30') selected @endif>15:30</option>
                               <option value="16:00" @if(old('condition')=='16:00') selected @endif>16:00</option>
                               <option value="16:30" @if(old('condition')=='16:30') selected @endif>16:30</option>
                               <option value="17:00" @if(old('condition')=='17:00') selected @endif>17:00</option>
							</select>
                        </div>
                        <div class="col-sm-1 col-md-1">
                            〜
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <select class="form-field" type="text" name="end_time" id="end_time" />
                               <option value="12:00" @if(old('condition')=='12:00') selected @endif>12:00</option>
                               <option value="12:30" @if(old('condition')=='12:30') selected @endif>12:30</option>
                               <option value="13:00" @if(old('condition')=='13:00') selected @endif>13:00</option>
                               <option value="13:30" @if(old('condition')=='13:30') selected @endif>13:30</option>
                               <option value="14:00" @if(old('condition')=='14:00') selected @endif>14:00</option>
                               <option value="14:30" @if(old('condition')=='14:30') selected @endif>14:30</option>
                               <option value="15:00" @if(old('condition')=='15:00') selected @endif>15:00</option>
                               <option value="15:30" @if(old('condition')=='15:30') selected @endif>15:30</option>
                               <option value="16:00" @if(old('condition')=='16:00') selected @endif>16:00</option>
                               <option value="16:30" @if(old('condition')=='16:30') selected @endif>16:30</option>
                               <option value="17:00" @if(old('condition')=='17:00') selected @endif>17:00</option>
                               <option value="17:30" @if(old('condition')=='17:30') selected @endif>17:30</option>
                               <option value="18:00" @if(old('condition')=='18:00') selected @endif>18:00</option>
                               <option value="18:30" @if(old('condition')=='18:30') selected @endif>18:30</option>
                               <option value="19:00" @if(old('condition')=='19:00') selected @endif>19:00</option>
                               <option value="19:30" @if(old('condition')=='19:30') selected @endif>19:30</option>
                               <option value="20:00" @if(old('condition')=='20:00') selected @endif>20:00</option>
							</select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required" style="vertical-align:middle;">現在の空き状況<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-1 col-md-1">
                            <select class="form-field" type="text" name="condition" id="condition" />
                            	<option value="green" @if(old('condition')=='green') selected @endif>○</option>
                            	<option value="orange" @if(old('condition')=='yellow') selected @endif>△</option>
                            	<option value="red" @if(old('condition')=='red') selected @endif>×</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">備考</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" name="bikou" id="bikou" />
                        </div>
                    </div>
                    <div class="form-group center">
                        <input name="action" id="submit_button" class="btn btn-success" type="submit" value="登録">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
