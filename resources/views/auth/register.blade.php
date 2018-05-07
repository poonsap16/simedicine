<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link rel="stylesheet" href="/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/new_css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/css/new_css/style.css">
<link rel="stylesheet" href="/css/bower_components/font-awesome/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
<link rel="stylesheet" href="/css/new_css/toastr.css">
<link rel="stylesheet" href="/css/new_css/bootstrapValidator.min.css">
<link href="/css/new_css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
  background: #eee !important;	
}
.wrapper {	
  margin-top: 50px;
  margin-bottom: 80px;
}
.form-signin {
  max-width: 800px;
  padding: 10px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  
}.form-signin-heading,.checkbox {
    margin-bottom: 30px;
}
.checkbox {
    font-weight: normal;
}
.form-control {
	position: relative;
	font-size: 15px;
	height: 40px;
	padding: 5px;
}
.fa.form-control-feedback {
    line-height: 40px;
}
#user_data{
    display: none;
}
</style>
</head>
<body>
@if( session('line') )
            <div id="verify">
                <input type="hidden"  id = "username" name = "username" value = "{{ session('line')['username'] }}">
                <!-- <button name = "check-verify" id = "check-verify" onclick="myFunction()">check verify</button> -->
                <center>
                    <h1>Please add IMISU as a friend on LINE application,</h1>
                    <h1>then verify by given 6 digits code below</h1>
                    <img src="{{ session('line')['line_qrcode_url'] }}" alt="">
                    <font color="red"><h1>Verify code : {{ session('line')['line_verify_code'] }}</h1></font>
                    <br/>
                    <h3><i>* This QR-Code is just for you, please DO NOT SHARE it. THANKS.</i></h3>
                    </center>
                </div>
        @else
<div class="wrapper">
<form class="form-signin" action="/register" method = "POST" id = "loginForm">       
    <h2 class="form-signin-heading">Register</h2><hr>
    <input type="hidden" name ="_token" value = "{{ csrf_token() }}">
    <input type="hidden" name ="document_id" id = "document_id" value = "">
    <div class="row">
        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
        <div class="form-group">
                <label for="ref_id">SAP ID : </label>
                <input type="number" class="form-control " name="ref_id" id="ref_id" required value="{{ old('ref_id') }}"/>
                <span class="help-block" id = "sap_error"></span>
            </div>
        </div>
    </div>
    <div id = "user_data">
    <div class="row">
        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
            <div class="form-group">
                <label for="full_name">Full Name in Thai : </label>
                <input type="text" class="form-control" name="full_name" id="full_name" required value="{{ old('full_name') }}" oninput="validateNameThai(this);">
                <span class="help-block" id = "full_name_error"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
            <div class="form-group">
                <label for="name_eng">Full Name in English : </label>
                <input type="text" class="form-control" name="name_eng" id="name_eng" required value="{{ old('name_eng') }}" oninput="validateNameEng(this);" >
                <span class="help-block" id = "name_eng_error"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
            <div class="form-group">
                <label for="email">EMAIL : </label>
                <input type="text" class="form-control" name="email" id="email" required value="{{ old('email') }}" oninput="validateEmail(this);">
                <span class="help-block" id = "email_error"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
            <div class="form-group">
                <label for="name">USERNAME : </label>
                <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}" oninput="validatename(this);">
                <span class="help-block" id = "name_error"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
            <div class="form-group">
                <label for="password">PASSWORD : </label>
                <input type="password" class="form-control" name="password" id="password" required value="{{ old('password') }}" oninput="validatePassword(this);"> 
                <span class="help-block" id = "password_error"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
            <div class="form-group">
                <label for="re_password">PASSWORD AGAIN : </label>
                <input type="password" class="form-control" name="re_password" id="re_password" required value="{{ old('re_password') }}" oninput="validateRePassword(this);">
                <span class="help-block" id = "re_password_error"></span>
            </div>
        </div>
    </div>
        <br/>
        <div class="row" >
            <center><button type="submit" name="submit"  id = "submit" class="btn btn-primary btn-icon"><i class="fa fa-check"></i> Register</button></center>
        </div>
    </div>
</form>
</div>
<div align = "center">
    @endif
    {{-- @if( $errors->any() ) --}}
    @if( session('status') )
    {!! session('status') !!}
    {{-- 
    <b><i>The ID <u>{{ old('ref_id') }}</u> is already taken. If you think it was wrong please contact Nalinee. YES, THE NALINEE.</i></b>
     --}}
    @endif
    </div>
    <script src='/js/new_js/jquery.min.js'></script>
    <script src='/js/new_js/bootstrap.min.js'></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="/js/new_js/validate.js"></script>
    <script type="text/javascript" src="/js/new_js/toastr.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.4.5/js/bootstrapValidator.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="/js/new_js/fileinput.min.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
        document.getElementById("submit").disabled = true;
    });
        $('#ref_id').on('input', function(e) {
            $('#user_data').slideUp();
            disableButton();
            var ref_id = $('#ref_id')
            if(ref_id.val().length != 8) {
                e.preventDefault();
            } else {
                $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'ref_id': $('#ref_id').val() 
                },
                success: function(data) {
                    // console.log(data);
                    if (data.reply_code != 0) {
                        $('#sap_error').html(data.reply_text);
                        ref_id.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        ref_id.closest('.form-group').find('i.fa').remove();
                        ref_id.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                        disableButton();
                    }else{
                        document.getElementById("ref_id").readOnly = true;
                        ref_id.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        ref_id.closest('.form-group').find('i.fa').remove();
                        ref_id.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        $('#sap_error').html("Searching..");
                            $.ajax({
                                type: 'POST',
                                data: {
                                '_token' : '{{ csrf_token()}}',
                                'sap_id': $('#ref_id').val() 
                            },
                            success: function(data) {
                                 // console.log(data);
                            if (data.active == 1){
                                // console.log(data);
                                $('#sap_error').html("");
                                $("#user_data").slideDown();
                                $('input[name=full_name]').val(data.name);    
                                $('input[name=name_eng]').val(data.name_en);  
                                $('input[name=email]').val(data.email);  
                                $('input[name=document_id]').val(data.document_id);  
                            }else if ( data.active == 0){
                                $('#sap_error').html(data.reply_text);
                                ref_id.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                                ref_id.closest('.form-group').find('i.fa').remove();
                                ref_id.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                                e.preventDefault();
                        }             
                    },
                    error: function(){ },
                    url: '/query-sap-id',
                cache:false
                });
            }
        },
        error: function(){ },
        url: '/validate',
        cache:false
        });
    }
  });
  function validateNameThai(full_name){ // validate email user
        var full_name= $('#full_name');
        if (full_name.val() != ''){
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'full_name': $('#full_name').val() 
                },
                success: function(data) {
                    // console.log(data);
                    if (data.reply_code != 0) {
                        $('#full_name_error').html(data.reply_text);
                        full_name.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        full_name.closest('.form-group').find('i.fa').remove();
                        full_name.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                        disableButton();
                    }else{
                        $('#full_name_error').html("");
                        full_name.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        full_name.closest('.form-group').find('i.fa').remove();
                        full_name.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        disableButton();
                    }
                },
                error: function(){ },
            url: '/validate',
            cache:false
        });
        }
    }
    function validateNameEng(name_eng){ // validate email user
        var name_eng= $('#name_eng');
        if (name_eng.val() != ''){
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'name_eng': $('#name_eng').val() 
                },
                success: function(data) {
                    // console.log(data);
                    if (data.reply_code != 0) {
                        $('#name_eng_error').html(data.reply_text);
                        name_eng.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        name_eng.closest('.form-group').find('i.fa').remove();
                        name_eng.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                        disableButton();
                    }else{
                        $('#name_eng_error').html("");
                        name_eng.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        name_eng.closest('.form-group').find('i.fa').remove();
                        name_eng.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        disableButton();
                    }
                },
                error: function(){ },
            url: '/validate',
            cache:false
            });
        }
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
    function validatename(name){ // validate email user
        var name = $('#name');
        if (name.val() != ''){
            validatePassword($('#password').val());
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'name': $('#name').val()
                },
                success: function(data) {
                    if (data.reply_code != 0) {
                        $('#name_error').html(data.reply_text);
                        name.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        name.closest('.form-group').find('i.fa').remove();
                        name.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                        disableButton();
                    }else{
                        $('#name_error').html("");
                        name.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        name.closest('.form-group').find('i.fa').remove();
                        name.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        disableButton();
                    }
                },
                error: function(){ },
            url: '/validate',
            cache:false
            });
        }
    }
    function validatePassword(password){
        validateRePassword();
        var password = $('#password');
        if (password.val() != ''){
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'name' : $('#name').val(),
                    'password': $('#password').val() 
                },
                success: function(data) {
                    if (data.reply_code != 0) {
                        $('#password_error').html( data.reply_text);
                        password.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        password.closest('.form-group').find('i.fa').remove();
                        password.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                        disableButton();
                    }else{
                        $('#password_error').html("");
                        password.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        password.closest('.form-group').find('i.fa').remove();
                        password.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
                        disableButton();
                    }
                },
                error: function(){ },
            url: '/validate',
            cache:false
            });
        }
    }
    function validateRePassword(re_password){
        var re_password = $('#re_password');
        if (re_password.val() != ''){
            $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'password' : $('#password').val(),
                    're_password': $('#re_password').val() 
                },
                success: function(data) {
                    if (data.reply_code != 0) {
                        $('#re_password_error').html(data.reply_text);
                        re_password.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        re_password.closest('.form-group').find('i.fa').remove();
                        re_password.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                        disableButton();
                    }else{
                        $('#re_password_error').html("");
                        re_password.closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                        re_password.closest('.form-group').find('i.fa').remove();
                        re_password.closest('.form-group').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');  
                        disableButton();
                    }
                },
                error: function(){ },
            url: '/validate',
            cache:false
            });
        }
    }
         
</script>
    </body>
    </html>