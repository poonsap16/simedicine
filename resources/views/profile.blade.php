<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="{{ url('/css/font-awesome/css/font-awesome.min.css')}}">
  <!-- <link rel="stylesheet" href="/css/new_css/quiz.css"> -->
  <link rel="stylesheet" href="/css/new_css/w3.css">
  <link rel="stylesheet" href="/css/new_css/hover-min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <style>
#verify_code { height: 60px;font-size: 30px;}
body {
    background-color: #F8F8F8;
}
#navbar{
  font-size: 15px;
}
hr {
    border: none;
    height: 1px;
    color:#E0E0E0;
    background-color:#E0E0E0;
}.col-centered{
    top: 40px;
    float: none;
    margin: 0 auto;
}.box {
    width: 200px;
    height: 50px;    
    padding: 11px;
    border: 1px solid red;
    font-size: 20px;
    background-color:#E0E0E0;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
.alert {
  border-radius: 0;
  -webkit-border-radius: 0;
  box-shadow: 0 1px 2px rgba(0,0,0,0.11);
  display: table;
  width: 100%;
}

.alert-white {
  background-image: linear-gradient(to bottom, #fff, #f9f9f9);
  border-top-color: #d8d8d8;
  border-bottom-color: #bdbdbd;
  border-left-color: #cacaca;
  border-right-color: #cacaca;
  color: #404040;
  padding-left: 61px;
  position: relative;
}

.alert-white.rounded {
  border-radius: 3px;
  -webkit-border-radius: 3px;
}

.alert-white.rounded .icon {
  border-radius: 3px 0 0 3px;
  -webkit-border-radius: 3px 0 0 3px;
}

.alert-white .icon {
  text-align: center;
  width: 45px;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  border: 1px solid #bdbdbd;
  padding-top: 15px;
}


.alert-white .icon:after {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  display: block;
  content: '';
  width: 10px;
  height: 10px;
  border: 1px solid #bdbdbd;
  position: absolute;
  border-left: 0;
  border-bottom: 0;
  top: 50%;
  right: -6px;
  margin-top: -3px;
  background: #fff;
}

.alert-white .icon i {
  font-size: 20px;
  color: #fff;
  left: 12px;
  margin-top: -10px;
  position: absolute;
  top: 50%;
}

.alert-info {
  background-color: #d9edf7;
  border-color: #98cce6;
  color: #3a87ad;
}

.alert-white.alert-info .icon, 
.alert-white.alert-info .icon:after {
  border-color: #3a8ace;
  background: #4d90fd;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
A:link { COLOR: #404040; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: #404040; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR: #404040; TEXT-DECORATION: none }
A:hover { COLOR: #404040; TEXT-DECORATION: none; font-weight: none }
  </style>
</head>
<body>
<div id= "navbar" class="w3-bar w3-border w3-white">
<font color="#404040">
  <a class="w3-bar-item w3-button w3-padding-24">Profile</a>
  <div style="float:right">
  <a  class="w3-bar-item w3-button w3-padding-24"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name}}</a>
  <a href="{{ url('/logout') }}" class="w3-bar-item w3-button w3-padding-24"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></a>
  </div>
</font>
</div>

<div class="form-horizontal">
        <div class="page col-xs-12 col-sm-8 col-md-5 col-centered" id = "wrap">
            <div class = "row">
            <font color="#404040"><h2><b>Notification</b></h2></font><hr>
                <div class="col-lg-12 col-md-12 col-sm-12 col-centered" id = "loadbar" style="display: none;">
                    <div class = "row">
                    <center><div class="loader"></div><br/><br/><br/><br/></center>
                    </div>
                </div>
            </div>
            <div class = "row">
                <div id = "select_channel">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button id = "email" class="w3-btn w3-blue w3-xxlarge button hvr-grow" style="width:100%"><span class="fa fa-envelope"></span>  Email </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button id = "line" class="w3-btn w3-green w3-xxlarge button hvr-grow" style="width:100%"><span class="fa fa-comments"></span>  Line</button>
                    </div>
                </div>
                <div id = "email_verify"  style="display: none;">
                <div class="row">
                    <div class="page col-xs-12 col-sm-12 col-md-12">
                        <div class="alert alert-info alert-white rounded" id = "alert">
                            <div class="icon">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            The verify code was sent, Please check you email.
                        </div>  
                    </div>
                </div>
                         <div class="page col-xs-8 col-sm-8  col-md-8 col-sm-offset-2 col-xs-offset-2">
                                  <div class="form-group">
                                    <label for="inputlg">Verify Code :</label>
                                    <input class="form-control input-lg" id="verify_code" type="text" style="text-align:center;">
                                </div>
                        </div>
                </div>
                <div id = "line_verify"  style="display: none;">
                        <div class="page col-xs-8 col-sm-8  col-md-8 col-sm-offset-2 col-xs-offset-2">
                            <div class="form-group">
                                Hello World!
                            </div>
                        </div>
                </div>
            </div>
            <div class = "row"><hr>
            test</div>
      </div>
</div>

<script>
    $( document ).ready(function() {
        $("#verify_code").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
         });
         $(function(){
            var ref_id_length = 6;
            $("#verify_code").keyup(function(){
                var this_length=ref_id_length-$(this).val().length;
                if(this_length<0){
                    $(this).val($(this).val().substr(0,6));
                }         
            });
         
        });
    });
$(function(){
    var loading = $('#loadbar').hide();
    var email_verify = $('#email_verify').hide();
    var line_verify = $('#line_verify').hide();
    $(document)
    .ajaxStart(function () {
        loading.show();
        email_verify.show();
        line_verify.show();
    }).ajaxStop(function () {
    	loading.hide();
      email_verify.hide();
      line_verify.hide();
    });
    
    $("#email").on('click',function () {
    	$('#select_channel').hide();
        $('#loadbar').show();
    	setTimeout(function(){   
            $('#loadbar').hide();   
            $('#email_verify').show();
    	}, 1500);
    });
    $("#line").on('click',function () {
    	$('#select_channel').hide();
        $('#loadbar').show();
    	setTimeout(function(){   
            $('#loadbar').hide();   
            $('#line_verify').show();
    	}, 1500);
    });
});	
$('#alert').addClass('animated bounce');
</script>
</body>
</html>
