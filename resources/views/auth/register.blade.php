<!DOCTYPE html>
<html lang="th-TH">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://icon-park.com/imagefiles/paper_plane_light_blue.png">
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
        background-color:#F5F5F5;
    }
    .bs-example{
    	margin: 20px;
    }
    body,ul,li,p{
        font-family: 'Kanit', sans-serif;
        }

    
    </style>
    <title>Register Page</title>
</head>
<body>
    @if( session('line') )
        <h1>Please add IMISU as a friend on LINE application,</h1>
        <h1>then verify by given 6 digits code below</h1>
        <img src="{{ session('line')['line_qrcode_url'] }}" alt="">
        <h1>Verify code : {{ session('line')['line_verify_code'] }}</h1>
        <br />
        <h3><i>* This QR-Code is just for you, please DO NOT SHARE it. THANKS.</i></h3>
    @else
    <br>
    <div class="container">
	    <div class="row">
                <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1"><br>
                    <div class="row">
                        <div class="modal-content">
                             <div class="modal-header">  
                                <h1 class="modal-title"><u>Welcome to Register page in 90s fashion.</u></h4>
                            </div>
                            <form action="register" method="POST">
                            {{ csrf_field() }}
							<div class="modal-body">
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="ref_id">SAP ID : </label>
                                        <input type="number" class="form-control" name="ref_id" required value="{{ old('ref_id') }}">
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">  
                                    <div class="form-group">
                                        <label for="password">PASSWORD :</label>
                                        <input type="password" class="form-control" name="password" required >
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">  
                                    <div class="form-group">
                                        <label for="password">PASSWORD AGAIN :</label>
                                        <input type="password" class="form-control" name="re-password" required >
                                    </div>
                                </div>

								<div class="row"></div>
							</div>

							<div class="modal-footer">
								<button type="submit" name="submit"  class="btn btn-success btn-icon"><i class="fa fa-check"></i> Register</button>
								
							</div>
						    </form>

		                </div>
	                </div>
                </div>  
	    </div>
	</div>

    @endif
    {{-- @if( $errors->any() ) --}}
    @if( session('status') )
    {!! session('status') !!}
    {{-- 
    <b><i>The ID <u>{{ old('ref_id') }}</u> is already taken. If you think it was wrong please contact Nalinee. YES, THE NALINEE.</i></b>
     --}}
    @endif

</body>
</html>
