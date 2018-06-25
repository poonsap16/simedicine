<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ url('/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="/css/new_css/w3.css">
<link rel="stylesheet" href="/css/new_css/hover-min.css">
<link rel="stylesheet" href="{{ url('/css/animate.css-master/animate.css')}}">
<link rel="stylesheet" href="{{ url('/css/bootstrap-3.3.7/dist/css/bootstrap.css')}}">

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="{{ url('/js/jquery.js')}}"></script>
<script src="{{ url('/css/bootstrap-3.3.7/dist/js/bootstrap.js')}}"></script>
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
        top: 20px;
        float: none;
        margin: 0 auto;
    }.col-email{
        top: 10px;
        float: none;
        margin: 0 auto;
    }
    
    .box {
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
    @-webkit-keyframes spin {
         0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    /* A:link { COLOR: #404040; TEXT-DECORATION: none; font-weight: normal }
    A:visited { COLOR: #404040; TEXT-DECORATION: none; font-weight: normal }
    A:active { COLOR: #404040; TEXT-DECORATION: none }
    A:hover { COLOR: #404040; TEXT-DECORATION: none; font-weight: none } */
    .fa.form-control-feedback {
        font-size: 27.5px;
        line-height: 47px;
    }
  button {
     display:none;
  }
</style>
</head>
<body>
    <div id= "navbar" class="w3-bar w3-border w3-white">
        <font color="#404040">
                &nbsp;&nbsp;<a href="{{ url('/profile') }}"><img src='{{ url("/logo/imisu.png")}}' width="100" class="c-slacklogo--color" alt="Slack"/></a>
            <!-- <a href = "{{ url('/profile') }}" class="w3-bar-item w3-button w3-padding-24">Profile</a> -->
            <div style="float:right">
                <a  class="w3-bar-item w3-button w3-padding-24"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name}}</a>
                <a href="{{ url('/logout') }}" class="w3-bar-item w3-button w3-padding-24"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></a>
            </div>
        </font>
    </div>
    @if ($response['reply_code'] == 0)
        <br/><center><h2> Both email and line was verified.</h2></center>
    @else
    <div id = "both_verified"  style="display: none;">
        <br/><center><h2> Both email and line was verified.</h2></center>
    </div>

    <div class="form-horizontal">
        <div class="page col-xs-12 col-sm-12 col-md-7 col-lg-6  col-centered" id = "wrap">
            <div id = "select_channel">
                <font color="#404040"><h2><b>Notification</b></h2>
                <div class = "row">
                <hr>
                </div>
                <div class = "row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-container"> 
                        <center>
                            <button id = "email_button" class="w3-btn w3-blue w3-xlarge " style="width:40%"><span class="fa fa-envelope"></span>  Email </button>
                            <button id = "line_button" class="w3-btn w3-green w3-xlarge" style="width:40%"><span class="fa fa-comments"></span>  Line</button>
                        </center>
                        </div>
                    </div>
                    
                </div>
                <div class = "row">
                <hr>
                </div>
    <!-- <label class="radio-inline"><b>Notify by :</b></label>
                        <label class="radio-inline"><input type="radio" id = "email_button" name="optradio">Email</label>
                        <label class="radio-inline"><input type="radio" id = "line_button" name="optradio">Line</label> -->
                </font>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-centered" id = "loadbar" style="display: none;">
            <div class = "row">
                <center><br/><br/><br/><br/><div class="loader"></div><br/><br/><br/><br/></center></div>
            </div>
        </div>
        <div id = "email_verify" style="display: none;" class = "page col-xs-12 col-sm-12 col-md-12  col-centered">
        
            <div class="page col-xs-12 col-sm-12 col-md-7 col-lg-6 col-email">
                    <div class="w3-card-4 w3-white">
                        <div class="w3-container ">
                            <br/><br/><br/>
                        </div>
                        <div class="w3-container">
                            <div class="row">
                                <div class="page col-xs-8 col-sm-8 col-md-8 col-email">
                                    <div class="alert alert-info alert-white rounded" id = "alert">
                                        <div class="icon"><i class="fa fa-info-circle"></i></div>
                                        The verify code was sent, Please check you email.
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="page col-xs-8 col-sm-8 col-md-8 col-email">
                                    <div class="form-group">
                                        <div id = "input_verify_code">  
                                            <input class="form-control input-lg" id="verify_code" type="text" style="text-align:center;" placeholder="Verify Code">
                                            <span class="help-block" id = "verify_error"></span>
                                        </div>
                                        <div id = "icon_verified" style="display: none;">
                                                <center><span class="fa fa-check-circle-o" style="font-size:150px; color:green;"></span><br>
                                                <fond style="font-size:20px; color:green;">Email was verified.</font>
                                                </center>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row" >
                                <div class="col-lg-12 col-md-12 col-sm-12" id = "resend">
                                    <center><a href="#" onclick="javascript:resend_for_email()" id = "resend"><font color="#0073e6"><span class="fa fa-share"></span>  Resend </font></a></center>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" >  
                                    <center><a href="#" onclick="javascript:changeEmail_for_email()"><font color="#0073e6"><span class="fa fa-edit"></span> Change Email</font></a></center>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                    </div>     
            </div>
        </div>
        <div id = "change_email" style="display: none;" class = "page col-xs-12 col-sm-12 col-md-12  col-centered">
            <div class="page col-xs-12 col-sm-12 col-md-7 col-lg-6 col-email">
                    <div class="w3-card-4 w3-white">
                        <div class="w3-container ">
                            <br/><br/>  
                        </div>
                        <div class="w3-container">
                            <div class="row">
                                <div class="page col-xs-10 col-sm-10 col-md-10 col-md-10 col-email">
                                    <div class="alert alert-info alert-white rounded" id = "change_email_alert">
                                        <div class="icon"><i class="fa fa-info-circle"></i></div>
                                            When you change email, The verify code will be sent to your new email immediately.
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="page col-xs-10 col-sm-10 col-md-10 col-md-10 col-email">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">    
                                        <div class="form-group">  
                                            <label for="inputlg">Input your new email :</label>
                                                <input class="form-control input-lg" id="email" type="text" style="text-align:center;" oninput="validateEmail(this);"> 
                                                <span class="help-block" id = "email_error"></span>
                                                <input type="hidden" id = "change_type">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row" >
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <center><button id = "change_email_button" class="w3-btn w3-blue w3-large button hvr-grow"><span class="fa fa-check"></span> Submit </button></center>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                    </div>     
            </div>
        </div>
        <div id = "line_verify" style="display: none;" class = "page col-xs-12 col-sm-12 col-md-12  col-centered">
            <div class="page col-xs-12 col-sm-12 col-md-7 col-lg-6 col-email">
                    <div class="w3-card-4 w3-white">
                        <div class="w3-container ">
                            <br/><br/><br/>
                        </div>
                        <div class="w3-container">
                            <div class="row">
                                <div class="page col-xs-8 col-sm-8 col-md-8 col-email">
                                    <div class="alert alert-info alert-white rounded" id = "line_alert">
                                        <div class="icon"><i class="fa fa-info-circle"></i></div>
                                            The QR code and The verify code was sent, Please check you email.
                                    </div>  
                                </div>
                            </div>
                            <br/>
                            <div class="row" >
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <center><a href="#" onclick="javascript:resend_for_line()" id = "resend"><font color="#0073e6"><span class="fa fa-share"></span>  Resend </font></a></center>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" >  
                                    <center><a href="#" onclick="javascript:changeEmail_for_line()"><font color="#0073e6"><span class="fa fa-edit"></span> Change Email</font></a></center>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                    </div>     
            </div>
        </div>
    </div>   
@endif
<script>
    $( document ).ready(function() {
        var refreshId =  setInterval(function(){ 
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'type' : 'check_email_line_verify'
                },
                success: function(data) {
                    console.log(data);
                        if (data.reply_code == 0){
                            $('#select_channel').hide();
                            $('#email_verify').hide();
                            $('#line_verify').hide();
                            $('#change_email').hide();
                            $('#line_verify').hide();
                            $('#both_verified').show();
                            clearInterval(refreshId);
                        }
                },
                error: function(){ },
            url: '/check-email-line-verify',
            cache:false
        });   
    }, 3000);
    });
$("#email_button").on('click',function () {
        $('#email_verify').hide();
        $('#change_email').hide();
        $('#line_verify').hide();
    	// $('#select_channel').hide();
        $('#loadbar').show();
    	setTimeout(function(){   
             $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'type' : 'send_email'
                },
                success: function(data) {
                    console.log(data);
                        if (data.reply_code == 0){  
                            $('#loadbar').hide();   
                            $('#email_verify').show();
                            $('#footer').show();
                        }
                        else if (data.reply_code == 9){
                            $('#loadbar').hide();
                            $('#alert').hide();
                            $('#resend').hide();
                            $('#input_verify_code').hide();
                            $('#email_verify').show();  
                            $('#icon_verified').fadeIn();
                        }else {
                            console.log(data);
                            $('#loadbar').hide();
                            $('#footer').hide();
                            $('#select_channel').show();
                        }
                },
                error: function(){ },
            url: '/send-email-verify',
            cache:false
        });
           
    	}, 500);
});
    $('#verify_code').on('input', function(e) {
            var verify_code = $('#verify_code')
            if(verify_code.val().length != 6) {
                e.preventDefault();
            } else {
                $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'type': 'verify_code',
                    'verify_code': $('#verify_code').val() 
                },
                success: function(data) {
                    console.log(data);
                    if (data.reply_code != 0) {
                        $('#verify_error').html(data.reply_text);
                        verify_code.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        verify_code.closest('.form-group').find('i.fa').remove();
                        verify_code.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback" style = "line-height: 55px;"></i>');
                    }else{
                        // console.log(data);
                        // $('#verify_error').html("");
                        // verify_code.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        // verify_code.closest('.form-group').find('i.fa').remove();
                        // verify_code.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback" style = "line-height: 55px;"></i>');
                        verify_code.closest('.form-group').removeClass('has-error has-feedback');
                        verify_code.closest('.form-group').find('i.fa').remove();
                        $('#alert').hide();
                        $('#resend').hide();
                        $('#input_verify_code').hide();
                        $('#icon_verified').fadeIn();
                    }
                },
                error: function(){ console.log('error')},
            url: '/email-verify-code',
            cache:false
        });
            }
    });
    function resend_for_email() {
        $('#email_verify').hide();
        $('#loadbar').show();   
        setTimeout(function(){   
             $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'type' : 'resend_email'
                },
                success: function(data) {
                        if (data.reply_code == 0){
                            console.log(data);
                            $('#loadbar').hide();   
                            $('#email_verify').show();
                        }else {
                            console.log(data);
                            $('#loadbar').hide();
                            $('#email_verify').show();
                            alert('ส่งไม่สำเร็จ');
                        }
                },
                error: function(){ },
            url: '/send-email-verify',
            cache:false
        });   
    	}, 500);   
    }
    function changeEmail_for_email(){
        var email = $('#email');
        disableButton();
        email.val('');
        email.closest('.form-group').find('i.fa').remove();
        email.closest('.form-group').removeClass('has-success has-error');
        $('#email_verify').hide();
        $('#loadbar').show();
        setTimeout(function(){
            $('#loadbar').hide(); 
            $('#change_type').val('email');
            $('#change_email').show();
            
    	}, 500);   
    }
    function validateEmail(email){ // validate email user
        var email = $('#email');
        if (email.val() != ''){
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'email': $('#email').val() 
                },
                success: function(data) {
                    // console.log(data);
                    if (data.reply_code != 0) {
                        $('#email_error').html(data.reply_text);
                        email.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        email.closest('.form-group').find('i.fa').remove();
                        email.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                        disableButton();
                    }else{
                        $('#email_error').html("");
                        email.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        email.closest('.form-group').find('i.fa').remove();
                        email.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        disableButton();
                    }
                },
                error: function(){ },
            url: '/validate',
            cache:false
            });
        }
    }
    function disableButton(){
       document.getElementById("change_email_button").disabled = true;
        var email = document.getElementById('email').value;        
        var email_error = document.getElementById('email_error').innerHTML;
        if( email != '' && email_error == ''){
            document.getElementById("change_email_button").disabled = false;
        }else {
            document.getElementById("change_email_button").disabled = true;
        }
   }
   $("#line_button").on('click',function () {
        $('#email_verify').hide();
        $('#change_email').hide();
        $('#line_verify').hide();
        $('#loadbar').show();
    	setTimeout(function(){   
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'type' : 'send_line'
                },
                success: function(data) {
                        if (data.reply_code == 0){
                            console.log(data);
                            $('#loadbar').hide();   
                            $('#line_verify').show();
                            $('#footer').show();
                        }else {
                            console.log(data);
                            $('#loadbar').hide();
                            $('#footer').hide();
                            $('#select_channel').show();
                        }
                },
                error: function(){ },
            url: '/send-line-verify',
            cache:false
        });   
    	}, 500);
    });
    $('#alert').addClass('animated bounce');
    $('#change_email_alert').addClass('animated bounce');
    $('#line_alert').addClass('animated bounce');

    function resend_for_line() {
        $('#line_verify').hide();
        $('#loadbar').show();   
        setTimeout(function(){   
                $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'type' : 'resend_line'
                },
                success: function(data) {
                        if (data.reply_code == 0){
                            console.log(data);
                            $('#loadbar').hide();
                            $('#line_verify').show();
                        }else {
                            console.log(data);
                            $('#loadbar').hide();
                            $('#line_verify').show();
                            alert('ส่งไม่สำเร็จ');
                        }
                },
                error: function(){ },
            url: '/send-line-verify',
            cache:false
        });   
     	}, 500);   
    }

    function changeEmail_for_line() {
        var email = $('#email');
        email.val('');
        email.closest('.form-group').find('i.fa').remove();
        email.closest('.form-group').removeClass('has-success has-error');
        $('#line_verify').hide();
        $('#loadbar').show();   
        setTimeout(function(){   
            $('#loadbar').hide();
            $('#change_type').val('line');
            $('#change_email').show();
     	}, 500);   
    }
    $("#change_email_button").on('click',function () {
        document.getElementById("change_email_button").disabled = true;
    	$('#change_email').hide();
        $('#loadbar').show();
    	setTimeout(function(){   
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'email' : $('#email').val(),
                    'change_type': $('#change_type').val()
                    },
                success: function(data) {
                        if (data.reply_code == 0){
                            if (data.change_type == 'email'){
                                console.log(data);
                                $('#icon_verified').hide();
                                $('#loadbar').hide();  
                                $('#alert').show();
                                $('#resend').show();
                                $('#input_verify_code').show(); 
                                $('#email_verify').show();
                            }else if (data.change_type =='line'){
                                $('#loadbar').hide();   
                                $('#line_verify').show();
                            }
                        }else {
                            console.log(data);
                            $('#loadbar').hide();
                            $('#select_channel').show();
                        }
                },
                error: function(){ },
            url: '/change-email',
            cache:false
        });
    	}, 500);
        $('#verify_error').remove();
        var verify_code = $('#verify_code');
        verify_code.val('');
        verify_code.closest('.form-group').find('i.fa').remove();
        verify_code.closest('.form-group').removeClass('has-success has-error');
    });
</script>
</body>
</html>
