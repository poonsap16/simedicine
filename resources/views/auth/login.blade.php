<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
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
	margin-top: 80px;
  margin-bottom: 80px;
}
.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  
  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}
	.checkbox {
	  font-weight: normal;
	}
	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		}
	}
	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}
	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}
</style>
</head> 

<body>
<div class="wrapper">
<form class="form-signin" action="/login" method = "POST" id = "loginForm">       
  <h2 class="form-signin-heading">Login</h2><hr>
    <input type="hidden" name = "_token" id "token" value = "{{ csrf_token() }}"/>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="ref_id" type="text" class="form-control" name="ref_id"  value = "{{ old('ref_id')}}" placeholder="SAP ID">
    </div><br/> 
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
    </div><br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
</form>
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
    <script>
      @if( session('status') )
        toastr.warning("{{ session('status') }}");
      @endif
    </script>
    </body>
    </html>