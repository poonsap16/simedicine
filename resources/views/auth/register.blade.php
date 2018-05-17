<html lang="en-US">
<head>
<title>Register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
<link rel="stylesheet" href="/css/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/new_css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body {
  background-color: #F7F7F7;	
}
.wrapper {	
    background-color: coral;
  margin-top: 50px;
  margin-bottom: 80px;
}
hr {
    border-top: 1px solid #ccc;
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
.w3-btn, .w3-btn:link, .w3-btn:visited {color:#FFFFFF;background-color:#4CAF50}
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
</style>
</head>
<body>
<div class="wrapper">
    <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
        <div class="w3-card-4 w3-white">
            <div class="w3-container ">
                <br/><h2>Register</h2><hr>
            </div>
            <form class="w3-container" action="/register" method = "POST" id = "loginForm">  
                <div class="row">
                    <div class="page col-xs-12 col-sm-10 col-md-10 col-sm-offset-1">
                        <div class="alert alert-info alert-white rounded" id = "alert">
                            <div class="icon">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            You need Faculty's account to register and login by ID. <br/>
                            If you don't have one, you will not be able to login the application.
                        </div>  
                    </div>
                </div>
                <input type="hidden" name ="_token" value = "{{ csrf_token() }}">
                <input type="hidden" name ="document_id" id = "document_id" value = "">
                <div class="row">
                    <div class="page col-xs-12 col-sm-10 col-md-10 col-sm-offset-1">
                        <div class="form-group">
                            <label for="ref_id" class="w3-text-black">SAP ID : </label>
                            <input type="number" class="form-control w3-input w3-border" name="ref_id" id="ref_id" required value="{{ old('ref_id') }}"/>
                            <span class="help-block" id = "sap_error"></span>
                        </div>
                    </div>
                </div>
                <div id = "user_data">
                    <div class="row">
                        <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
                            <div class="form-group">
                                <label for="full_name" class="w3-text-black">Full Name in Thai : </label>
                                <input type="text" class="form-control w3-input w3-border" name="full_name" id="full_name" required value="{{ old('full_name') }}" oninput="validateNameThai(this);">
                                <span class="help-block" id = "full_name_error"></span>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
                        <div class="form-group">
                            <label for="name_eng" class="w3-text-black">Full Name in English : </label>
                            <input type="text" class="form-control w3-input w3-border" name="name_eng" id="name_eng" required value="{{ old('name_eng') }}" oninput="validateNameEng(this);" >
                            <span class="help-block" id = "name_eng_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
                        <div class="form-group">
                            <label for="email" class="w3-text-black">EMAIL : </label>
                            <input type="text" class="form-control w3-input w3-border" name="email" id="email" required value="{{ old('email') }}" oninput="validateEmail(this);">
                            <span class="help-block" id = "email_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1">
                        <div class="form-group">
                            <label for="name" class="w3-text-black">USERNAME : </label>
                            <input type="text" class="form-control w3-input w3-border" name="name" id="name" required value="{{ old('name') }}" oninput="validatename(this);">
                            <span class="help-block" id = "name_error"></span>
                        </div>
                    </div>
                </div>
            <br/>
                <div class="row" >
                    <center><button type="submit" name="submit"  id = "submit" class="w3-btn w3-margin-bottom"><i class="fa fa-check"></i> Register</button></center>
                </div>
            </div>
            <br/>
            </form>
        </div>
    </div>
    <div class="page col-xs-12 col-sm-12 col-md-12">
    <center><a href="{{url('/login')}}"><font color="#0073e6">Sign in</font></a></center>
    </div>
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
        $("#ref_id").keydown(function (e) {
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
            var ref_id_length = 8;
            $("#ref_id").keyup(function(){
                var this_length=ref_id_length-$(this).val().length;
                if(this_length<0){
                    $(this).val($(this).val().substr(0,8));
                }         
            });
         
        });
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
    function disableButton(){
       document.getElementById("submit").disabled = true;
        var ref_id = document.getElementById('ref_id').value;        
        var full_name = document.getElementById('full_name').value;
        var name_eng = document.getElementById('name_eng').value;
        var email = document.getElementById('email').value;
        var name = document.getElementById('name').value;
        var sap_error = document.getElementById('sap_error').innerHTML;
        var full_name_error = document.getElementById('full_name_error').innerHTML;
        var name_eng_error = document.getElementById('name_eng_error').innerHTML;
        var email_error = document.getElementById('email_error').innerHTML;      
        var name_error = document.getElementById('name_error').innerHTML;
        if( ref_id != '' && full_name  != '' && name_eng  != '' && email  != '' && name  != ''&& name  != ''
           && sap_error =='' && full_name_error == '' && name_eng_error == '' && email_error == '' && name_error == ''){
                document.getElementById("submit").disabled = false;
        }else {
            document.getElementById("submit").disabled = true;
                    }
   }

   $('#alert').addClass('animated bounce');
</script>
    </body>
    </html>