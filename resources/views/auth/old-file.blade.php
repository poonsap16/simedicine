<body>
         @if( session('line') )
            <div id="verify">
                <input type="hidden"  id = "username" name = "username" value = "{{ session('line')['username'] }}">
                <button name = "check-verify" id = "check-verify" onclick="myFunction()">check verify</button>
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
                                    <div id="custom-search-input">
                                        <div class="input-group col-md-12">
                                            <input type="number" name = "sap_id" id = "sap_id" class="form-control" placeholder="SAP ID" />
                                                <span class="input-group-btn">
                                                <button class="btn btn-info" data-loading-text="<i class='fa fa-spinner fa-spin '></i> กำลังค้นหาข้อมูล" type="button" name = "button" id = "button">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="name_thai">ชื่อไทย : </label>
                                        <input type="text" class="form-control" name="name_thai" id="name_thai" required value="{{ old('name_thai') }}">
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="name_eng">ชื่ออังกฤษ : </label>
                                        <input type="text" class="form-control" name="name_eng" id="name_eng" required value="{{ old('name_eng') }}">
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="email">Email : </label>
                                        <input type="text" class="form-control" name="email" id="email" required value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="username">Username : </label>
                                        <input type="text" class="form-control" name="username" id="username" required value="{{ old('username') }}">
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">  
                                    <div class="form-group">
                                        <label for="password">PASSWORD :</label>
                                        <input type="password" class="form-control" name="password" id ="password" required >
                                    </div>
                                </div>
                                <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">  
                                    <div class="form-group">
                                        <label for="re_password">PASSWORD AGAIN :</label>
                                        <input type="password" class="form-control" name="re_password" id="re_password"  required  >
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
    <br>

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
    $('#button').click(function(){
        $('#button').button('loading');
        $.ajax({
                    type: 'POST',
                    data: {
                    '_token' : '{{ csrf_token()}}',
                    'sap_id': $('#sap_id').val()
                    
                },
                success: function(data) {
                    $('input[name=name_thai]').val(data.name);    
                    $('input[name=name_eng]').val(data.name_en);  
                    $('input[name=email]').val(data.email);    
                    var x = data.document_id;             
                },
        error: function(){ },
        url: '/query-sap-id',
        cache:false
        });
    });
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
<div align = "center">
    @endif
    {{-- @if( $errors->any() ) --}}
    @if( session('status') )
    {!! session('status') !!}
    {{-- 
    <b><i>The ID <u>{{ old('sap_id') }}</u> is already taken. If you think it was wrong please contact Nalinee. YES, THE NALINEE.</i></b>
     --}}
    @endif
    </div>
</script>
</body>