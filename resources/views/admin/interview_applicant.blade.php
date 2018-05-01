<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | 面接結果登録</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery.raty.js"></script>
        <script type="text/javascript" src="../jquery.raty.css"></script>

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

            .content {
                text-align: center;
            }
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}

            .title {
                font-size: 84px;
            }


            .m-b-md {
                margin-bottom: 30px;
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
				padding:15px 0 40px;
			}
			.card-body{
				font-size:14px;
			}
			
			h2{
				font-size: 20px;
			}
			textarea{
				width:100%;
				height:40px;
				resize: none;
			}
			
			.btn-success{
				width:80px;
				height:30px;
				font-size: 15px;
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
                        <a href="/admin/logout">ログアウト</a>
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
                    <a href="/admin/list_applicant" class="nav-link active">
                        応募一覧
                    </a>
                </li>
            </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a href="/admin/home" class="nav-link">
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
                <a href="/admin/edit_admin" class="nav-link">
                    管理者情報の変更
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_stylistadmin" class="nav-link">
                    スタイリスト管理者一覧・編集
                </a>
            </li>             
            <li class="nav-item">
                <a href="/admin/list_worker" class="nav-link">
                    スタイリスト一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_user" class="nav-link">
                    ユーザー一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_order" class="nav-link">
                    依頼一覧
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
                <a href="/admin/list_pointpay" class="nav-link">
                    ポイント購入者情報
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/view_info" class="nav-link">
                    ポイント・時間情報
                </a>
            </li>       
        </ul>
    </nav>
          <div class="card">
                <div class="card-header bold" style="font-size:25px;">{{ $applicant->name }}さんの面接結果登録</div>
                <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form method="POST" action="/admin/interview_applicant?applicant_id={{ $applicant->id }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" id="name" value="{{ $applicant->name }}">
                    <input type="hidden" name="name_kana" id="name_kana" value="{{ $applicant->name_kana }}">
                    <input type="hidden" name="email" id="email" value="{{ $applicant->email }}">
                    <input type="hidden" name="tel" id="tel" value="{{ $applicant->tel }}">
                    <input type="hidden" name="birthday" id="birthday" value="{{ $applicant->birthday }}">
                    <input type="hidden" name="post" value="{{ $applicant->post }}">
                    <input type="hidden" name="pref" value="{{ $applicant->pref }}">
                    <input type="hidden" name="address_1" value="{{ $applicant->address_1 }}">
                    <input type="hidden" name="address_2" value="{{ $applicant->address_2 }}">
                    <input type="hidden" name="address_3" value="{{ $applicant->address_3 }}">
                    <input type="hidden" name="gender" value="{{ $applicant->gender }}">
                    <input type="hidden" name="job" value="{{ $applicant->job }}">
                   <input type="hidden" name="job_2" value="{{ $applicant->job_2 }}">
                   <input type="hidden" name="job_3" value="{{ $applicant->job_3 }}">
                   
                    <h2>応募者データ</h2>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">お名前</div>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            {{ $applicant->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">フリガナ</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            {{ $applicant->name_kana }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $applicant->pref }}{{ $applicant->address_1 }}{{ $applicant->address_2 }}{{ $applicant->address_3 }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">性別</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            {{ $applicant->gender }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title">生年月日</div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            {{ $applicant->birthday_1 }} 年 {{ $applicant->birthday_2 }} 月 {{ $applicant->birthday_3 }}日
			            </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">技術者デビュー</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $applicant->job }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">一番長く勤めたお店</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                           店名：{{ $applicant->job_2 }} &nbsp; 期間：{{ $applicant->job_3 }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">自己PR</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $applicant->pr }}
                        </div>
                    </div>
                    <br><br>
                    <h2>面接結果登録</h2>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カット</div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div id="star1" onclick="star_1_func()"></div>
                            <input type="hidden" name="score_1" id="score_1" value={{ (old('score_1')==null)?$applicant->score_1: old('score_1') }}>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
    							$('#star1').raty({
    								score:  {{ (old('score_1')==null)?$applicant->score_1: old('score_1') }},
							    	click: function(score, evt) {
            						  $("#score_1").val(score);
            					    }
								});
    							var star_1_func = function () {
	   								$('input:checkbox[name="fuka_1"]').prop('checked',false);
    		                  	}
							</script>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <input type="checkbox" name="fuka_1" value="1" @if(old('fuka_1')=='1') checked @endif onclick="fuka_1_func(this)">対応不可
		                </div>
		                <script type="text/javascript">
		                	var fuka_1_func = function (checkbox) {
			                	if (checkbox.value == "1") {
    		                		$('#star1').raty({
        								score:  0,
    								});
                					$("#score_1").val(0);
    			                }
		                  	}
		                </script>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カラー</div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div id="star2" onclick="star_2_func()"></div>
                            <input type="hidden" name="score_2" id="score_2" value={{ (old('score_2')==null)?$applicant->score_2: old('score_2') }}>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
    							$('#star2').raty({
    								score:  {{ (old('score_2')==null)?$applicant->score_2: old('score_2') }},
							    	click: function(score, evt) {
            						  $("#score_2").val(score);
            					    }
								});
    							var star_2_func = function () {
	   								$('input:checkbox[name="fuka_2"]').prop('checked',false);
    		                  	}
							</script>
                        </div>
                        <div class="col-sm-2 col-md-2">
          			        <input type="checkbox" name="fuka_2" value="1" @if(old('fuka_2')=='1') checked @endif onclick="fuka_2_func(this)">対応不可
		  		        </div>
		                <script type="text/javascript">
		                	var fuka_2_func = function (checkbox) {
			                	if (checkbox.value == "1") {
    		                		$('#star2').raty({
        								score:  0,
    								});
                					$("#score_2").val(0);
    			                }
		                  	}
		                </script>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">パーマ</div>
                        </div>
              			<div class="col-sm-2 col-md-2">
                            <div id="star3" onclick="star_3_func()"></div>
                            <input type="hidden" name="score_3" id="score_3" value={{ (old('score_3')==null)?$applicant->score_3: old('score_3') }}>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
    							$('#star3').raty({
    								score:  {{ (old('score_3')==null)?$applicant->score_3: old('score_3') }},
							    	click: function(score, evt) {
            						  $("#score_3").val(score);
            					    }
								});
    							var star_3_func = function () {
	   								$('input:checkbox[name="fuka_3"]').prop('checked',false);
    		                  	}
							</script>
                        </div>
                        <div class="col-sm-2 col-md-2">
          			        <input type="checkbox" name="fuka_3" value="1" @if(old('fuka_3')=='1') checked @endif onclick="fuka_3_func(this)">対応不可
		                </div>
		                <script type="text/javascript">
		                	var fuka_3_func = function (checkbox) {
			                	if (checkbox.value == "1") {
    		                		$('#star3').raty({
        								score:  0,
    								});
                					$("#score_3").val(0);
    			                }
		                  	}
		                </script>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">縮毛矯正</div>
                        </div>
        		        <div class="col-sm-2 col-md-2">
                            <div id="star4" onclick="star_4_func()"></div>
                            <input type="hidden" name="score_4" id="score_4" value={{ (old('score_4')==null)?$applicant->score_4: old('score_4') }}>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
    							$('#star4').raty({
    								score:  {{ (old('score_4')==null)?$applicant->score_4: old('score_4') }},
							    	click: function(score, evt) {
            						  $("#score_4").val(score);
            					    }
								});
    							var star_4_func = function () {
	   								$('input:checkbox[name="fuka_4"]').prop('checked',false);
    		                  	}
							</script>
                        </div>
                       <div class="col-sm-2 col-md-2">
          			        <input type="checkbox" name="fuka_4" value="1" @if(old('fuka_4')=='1') checked @endif onclick="fuka_4_func(this)">対応不可
		                </div> 
		                <script type="text/javascript">
		                	var fuka_4_func = function (checkbox) {
			                	if (checkbox.value == "1") {
    		                		$('#star4').raty({
        								score:  0,
    								});
                					$("#score_4").val(0);
    			                }
		                  	}
		                </script>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">エクステ</div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div id="star5" onclick="star_5_func()"></div>
                            <input type="hidden" name="score_5" id="score_5" value={{ (old('score_5')==null)?$applicant->score_5: old('score_5') }}>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
    							$('#star5').raty({
    								score:  {{ (old('score_5')==null)?$applicant->score_5: old('score_5') }},
							    	click: function(score, evt) {
            						  $("#score_5").val(score);
            					    }
								});
    							var star_5_func = function () {
	   								$('input:checkbox[name="fuka_5"]').prop('checked',false);
    		                  	}
							</script>
                        </div>
                        <div class="col-sm-2 col-md-2">
           			        <input type="checkbox" name="fuka_5" value="1" @if(old('fuka_5')=='1') checked @endif onclick="fuka_5_func(this)">対応不可
		                </div>
 		                <script type="text/javascript">
		                	var fuka_5_func = function (checkbox) {
			                	if (checkbox.value == "1") {
    		                		$('#star5').raty({
        								score:  0,
    								});
                					$("#score_5").val(0);
    			                }
		                  	}
		                </script>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">ヘアセット</div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div id="star6" onclick="star_6_func()"></div>
                            <input type="hidden" name="score_6" id="score_6" value={{ (old('score_6')==null)?$applicant->score_6: old('score_6') }}>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
    							$('#star6').raty({
    								score:  {{ (old('score_6')==null)?$applicant->score_6: old('score_6') }},
							    	click: function(score, evt) {
            						  $("#score_6").val(score);
            					    }
								});
    							var star_6_func = function () {
	   								$('input:checkbox[name="fuka_6"]').prop('checked',false);
    		                  	}
							</script>
                        </div>
                        <div class="col-sm-2 col-md-2">
           			        <input type="checkbox" name="fuka_6" value="1" @if(old('fuka_6')=='1') checked @endif onclick="fuka_6_func(this)">対応不可
		                </div>
 		                <script type="text/javascript">
		                	var fuka_6_func = function (checkbox) {
			                	if (checkbox.value == "1") {
    		                		$('#star6').raty({
        								score:  0,
    								});
                					$("#score_6").val(0);
    			                }
		                  	}
		                </script>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">会話</div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div id="star7" onclick="star_7_func()"></div>
                            <input type="hidden" name="score_7" id="score_7" value={{ (old('score_7')==null)?$applicant->score_7: old('score_7') }}>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
    							$('#star7').raty({
    								score:  {{ (old('score_7')==null)?$applicant->score_7: old('score_7') }},
							    	click: function(score, evt) {
            						  $("#score_7").val(score);
            					    }
								});
    							var star_7_func = function () {
	   								$('input:checkbox[name="fuka_7"]').prop('checked',false);
    		                  	}
							</script>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <input type="checkbox" name="fuka_7" value="1" @if(old('fuka_7')=='1') checked @endif onclick="fuka_7_func(this)">対応不可
		                </div>
		                <script type="text/javascript">
		                	var fuka_7_func = function (checkbox) {
			                	if (checkbox.value == "1") {
    		                		$('#star7').raty({
        								score:  0,
    								});
                					$("#score_7").val(0);
    			                }
		                  	}
		                </script>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">対応年齢層</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field" type="text" name="score_age" id="score_age" value={{ old('score_age') }}></input>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">対応エリア</div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <input class="form-field" type="text" name="taiou_area" id="taiou_area" placeholder="都道府県（正確に記入）"  value={{ old('taiou_area') }}></input>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <input class="form-field" type="text" name="taiou_area_2" id="taiou_area_2" placeholder="市区町村（正確に記入）" value={{ old('taiou_area_2') }}></input>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">その他</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                           <textarea class="form-field" name="score_biko" id="score_biko" />{{ old('score_biko') }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">合否結果</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input type="radio" name="status" value="面接合格" @if(old('status')=='面接合格') checked @endif>合格&nbsp;
                            <input type="radio" name="status" value="面接不合格" @if(old('status')=='面接不合格') checked @endif>不合格&nbsp;
                            <input type="radio" name="status" value="保留" @if(old('status')=='保留') checked @endif>保留
                        </div>
                    </div>
                    <hr>
                    <div class="form-group center">
                        <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="結果登録"></center>
                    </div>
                </form> 
                </div>
                <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
            </div>
            
    </body>
</html>
