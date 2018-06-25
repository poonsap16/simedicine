<html lang="en-US">
<head>
<title>Login</title>
<link rel="stylesheet" href="{{ url('/css/bootstrap-3.3.7/dist/css/bootstrap.css')}}">
<link rel="stylesheet" href="/css/new_css/font-kanit.css">
<link rel="stylesheet" href="{{ url('/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ url('/css/new_css/w3.css')}}">
<link rel="stylesheet" href="{{ url('/css/animate.css-master/animate.css')}}">
<link rel="stylesheet" href="{{ url('/css/new_css/toastr.css')}}"/>
<script src="{{ url('/js/jquery.js')}}"></script>
<script src="{{ url('/css/bootstrap-3.3.7/dist/js/bootstrap.js')}}"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body {
  background-color: #F7F7F7;	
}
.wrapper {	
    background-color: #F7F7F7;
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
  background-color: #F7F7F7;
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
.col-centered{
    float: none;
    margin: 0 auto;
}
</style>
</head>
<body>
<div class="wrapper">
    <div class="page col-xs-12 col-sm-6 col-md-5  col-centered">
        <div class="w3-card-4 w3-white">
            <div class="w3-container ">
                <br/><h2>Log in</h2><hr>
            </div>
            <form class="w3-container" action="/login" method = "POST" id = "loginForm">
                <div class="row">
                    <div class="page col-xs-12 col-sm-10 col-md-10 col-sm-offset-1">
                        <div class="alert alert-info alert-white rounded" id = "alert">
                            <div class="icon">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            You need Faculty's account to register and login by ID.
                        </div>  
                    </div>
                </div>
                <input type="hidden" name ="_token" value = "{{ csrf_token() }}">
                <input type="hidden" name ="document_id" id = "document_id" value = "">
                <div class="row">
                    <div class="page col-xs-12 col-sm-10 col-md-10 col-sm-offset-1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="ref_id" type="text" class="form-control" name="ref_id"  value = "{{ old('ref_id')}}" placeholder="SAP ID">     
                       </div>
                    </div>
                </div>
                <br/>
                <div class = "row">
                    <div class="page col-xs-12 col-sm-10 col-md-10 col-sm-offset-1">
                       <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row" >
                    <center><button type="submit" name="submit"  id = "submit" class="w3-btn w3-margin-bottom"><i class="fa fa-check"></i> Login</button></center>
                </div>
            </div>
            <br/>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/toastr.min.js"></script>
    <script>   
@if( session('status') )toastr.warning("{{ session('status') }}");@endif
@if( session('alert') )toastr.success("{{ session('alert') }}"); @endif 
$('#alert').addClass('animated bounce');
    </script>
    
    </body>
    </html>