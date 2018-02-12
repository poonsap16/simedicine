<!DOCTYPE html>
<html lang="th-TH">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://entouragebox.files.wordpress.com/2016/01/add-user.png">
    <link rel="stylesheet" href="/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/new_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/bower_components/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
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
    button {
        display:none;
    }
    </style>
    <title>Register Page</title>
    </head>
    <body>
         @if( session('line') )
            <div id="verify">
                <input type="hidden"  id = "username" name = "username" value = "{{ session('line')['username'] }}">
                <button name = "check-verify" id = "check-verify" onclick="myFunction()">check verify</button>
                <center>
                    <h1>Please add IMISU as a friend on LINE application,</h1>
                    <h1>then verify by given 6 digits code below</h1>
                    <img src="{{ session('line')['line_qrcode_url'] }}" alt="">
                    <h1>Verify code : {{ session('line')['line_verify_code'] }}</h1>
                    <br/>
                    <h3><i>* This QR-Code is just for you, please DO NOT SHARE it. THANKS.</i></h3>
                    </center>
                </div>
        @else
        <br>
        <div class="container">
	        <div class="row">
                <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1"><br>
                    <div class="row">
                        <div class="modal-content">
                             <div class="modal-header">  
                                <h1 class="modal-title">Register</h4>
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
                                        <label for="re_password">PASSWORD AGAIN :</label>
                                        <input type="password" class="form-control" name="re_password" required >
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือนจากระบบ</h5>
                    </div>
                    <div class="modal-body">
                        <h2><center><span class="glyphicon glyphicon-ok text-success" ></span> ชื่อผู้ใช้ได้รับการตรวจสอบแล้ว</center></h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id = "redirect" class="btn btn-primary">ตกลง</button>
                    </div>
                </div>
            </div>
    </div>
<script src='/js/new_js/jquery.min.js'></script>
<script src='/js/new_js/bootstrap.min.js'></script>
<script>
    $('#check-verify').click();
        function myFunction() {
            setInterval(function(){ 
                $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'username': $('#username').val()
                    
                },
                success: function(data) {
                    // console.log(data);
                    if (data['reply_code'] == 0){ //จริงต้องเท่ากับ 0
                        $('#verify').hide();
                        $("#myModal").modal()
                        if ($('#redirect').click(function(){
                            window.location.href = "/register";
                        }));                        
                }
            },
      error: function(){ },
      url: '/check-line-verify',
      cache:false
    });
 }, 3000);
}
</script>
</body>
</html>
