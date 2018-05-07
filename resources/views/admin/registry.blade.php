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
<nav class="navbar navbar-default fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a href="#" class="navbar-brand"></a> -->
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span> Admin Page</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li class="default"><a href=""><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->full_name }} (ผู้ดูแลระบบ)</a></li>
                <li class="default"><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ</a></li>
            </ul>
    </div>
</nav>
        <div class="container">
	        <div class="row">
                <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1"><br>
                    <div class="row">
                        <div class="modal-content">
                             <div class="modal-header">  
                                <h1 class="modal-title">User Registry</h4>
                            </div>
                            <form action="/add-user" method="POST">
                            {{ csrf_field() }}
							<div class="modal-body">
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="ref_id">SAP ID : </label>
                                        <input type="text" class="form-control" name="ref_id" id="ref_id" required value="{{ getOldOrField($registry, 'ref_id') }}">
                                        <span class="help-block" id = "sap_error"></span>
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="document_id">Document ID : </label>
                                        <input type="text" class="form-control" name="document_id" id="document_id" required value="{{ getOldOrField($registry, 'document_id') }}" readonly/>
                                        <span class="help-block" id = "document_error"></span>
                                   </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="full_name">Full Name in Thai: </label>
                                        <input type="text" class="form-control" name="full_name" id="full_name" required value="{{ getOldOrField($registry, 'full_name') }}" readonly/> 
                                        <span class="help-block" id = "full_name_error"></span>
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="pln">Pln : </label>
                                        <input type="text" class="form-control" name="pln" id="pln" value="{{ getOldOrField($registry, 'pln') }}">
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="status">Division :</label>
                                                <select name ="status"  id ="status" class="form-control" required/>
                                                    <option value="" hidden selected>Select division of user</option>
                                                        @foreach ($divisions as $division)
                                                            <option value="{{ $division['id'] }}" {{ getOldOrField($registry, 'division_name') === null ? '' : ((getOldOrField($registry, 'division_name') == $division['name']) ? 'selected' : '') }}>
                                                                {{ $division['name_thai'] }}
                                                            </option>
                                                        @endforeach
                                                </select>
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="status">Status :</label>
                                                <select name ="status"  id ="status" class="form-control" required/>
                                                    <option value="" hidden selected>Select status of user</option>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status['id'] }}" {{ getOldOrField($registry, 'status') === null ? '' : ((getOldOrField($registry, 'status') == $status['name']) ? 'selected' : '') }}>
                                                                {{ $status['name'] }}
                                                            </option>
                                                        @endforeach
                                                </select>
                                    </div>
                                </div>
								<div class="row"></div>
							</div>

							<div class="modal-footer">
								<button type="submit" name="submit" id = "submit" class="btn btn-success btn-icon"><i class="fa fa-check"></i> Submit</button>
							</div>
						    </form>
		                </div>
	                </div>
                </div>  
	    </div>
	</div>
    <br>
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
        // document.getElementById("submit").disabled = true;
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
        $("#pln").keydown(function (e) {
            
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
    });
        $('#ref_id').on('input', function(e) {
            var ref_id = $('#ref_id')
            if(ref_id.val().length != 8) {
                e.preventDefault();
            } else {
                $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'ref_id_registry': $('#ref_id').val() 
                },
                success: function(data) {
                    // console.log(data);
                    if (data.reply_code != 0) {
                        $('#sap_error').html(data.reply_text);
                        ref_id.closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
                        ref_id.closest('.form-group').find('i.fa').remove();
                        ref_id.closest('.form-group').append('<i class="fa fa-close  fa-lg form-control-feedback"></i>');
                    }else{
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
                            if (data.active == 1){
                                $('#sap_error').html("");
                                document.getElementById("ref_id").readOnly = true;
                                $('input[name=full_name]').val(data.name);    
                                $('input[name=document_id]').val(data.document_id);  
                                document.getElementById("pln").focus();s
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
  function disableButton(){
        document.getElementById("submit").disabled = true;
        var ref_id = document.getElementById('ref_id').value;
        var full_name = document.getElementById('full_name').value;
        var name_eng = document.getElementById('name_eng').value;
        var email = document.getElementById('email').value;
        var name = document.getElementById('name').value;
        var password = document.getElementById('password').value;
        var re_password = document.getElementById('re_password').value;
        var sap_error = document.getElementById('sap_error').innerHTML;
        var full_name_error = document.getElementById('full_name_error').innerHTML;
        var name_eng_error = document.getElementById('name_eng_error').innerHTML;
        var email_error = document.getElementById('email_error').innerHTML;
        var name_error = document.getElementById('name_error').innerHTML;
        var password_error = document.getElementById('password_error').innerHTML;
        var re_password_error = document.getElementById('re_password_error').innerHTML;
        if( ref_id != '' && full_name  != '' && name_eng  != '' && email  != '' && name  != ''&& name  != ''&& password  != '' && re_password != '' 
            && sap_error =='' && full_name_error == '' && name_eng_error == '' && email_error == '' && name_error == '' && password_error == '' && re_password_error == '' ){
                document.getElementById("submit").disabled = false;
        }else {
            document.getElementById("submit").disabled = true;
        }
    }
    $(function(){
    var ref_id_length = 8;
    var pln_length=5; // กำหนดจำนวนตัวอักษร
    $("#ref_id").keyup(function(){ // เมื่อ textarea id เท่ากับ data  มี event keyup
            var this_length=ref_id_length-$(this).val().length; // หาจำนวนตัวอักษรที่เหลือ
            if(this_length<0){
                $(this).val($(this).val().substr(0,8)); // แสดงตามจำนวนตัวอักษรที่กำหนด
            }         
    });
    $("#pln").keyup(function(){ // เมื่อ textarea id เท่ากับ data  มี event keyup
            var this_length=pln_length-$(this).val().length; // หาจำนวนตัวอักษรที่เหลือ
            if(this_length<0){
                $(this).val($(this).val().substr(0,5)); // แสดงตามจำนวนตัวอักษรที่กำหนด
            }         
    });
});
    </script>
    </body>
    
    </html>