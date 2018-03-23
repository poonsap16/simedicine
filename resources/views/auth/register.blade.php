<!DOCTYPE html>
<html lang="th-TH">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://entouragebox.files.wordpress.com/2016/01/add-user.png">
    <link rel="stylesheet" href="/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/new_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/css/new_css/bootstrapValidator.min.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    
    <style type="text/css">
    body {
        background-color:#f2f2f2;
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
    #panel, #flip {
    padding: 5px;
    /* text-align: center; */
    background-color: #ffffff;
    }
    #panel {
        display: none;
    }
    #sap_id,#document_id{
        text-align: center;   
}
    </style>
    <title>Register Page</title>
    </head>
    <body>
    <br><br>
    <div class="container">
            <div class="row">
                <div class="page col-xs-12 col-sm-8 col-md-10 col-sm-offset-1"><br>
                    <div class="row">
                        <div class="modal-content">
                                <div class="modal-header">  
                                    <h1 class="modal-title">Register</h1>
                                </div>
                                <div class = "modal-body" id = "flip">
                                    <br>
                                    <div class="page col-xs-12 col-sm-8 col-md-8 col-sm-offset-3">
                                        <div class="form-group form-group-lg">
                                            <div class="col-xs-9">
                                                <label for="sap_id"><h4>SAP ID :</h4></label>
                                                <input class="form-control" name = "sap_id" id="sap_id" type="number" required value="{{ old('sap_id') }}">
                                            </div>    
                                        </div>
                                            <div class="col-xs-9">
                                            <font color=#FF0033><label name = "sap_error" id = "sap_error"></label></font>
                                            </div>
                                        <div class="form-group form-group-lg">
                                            <div class="col-xs-9">
                                                <label for="document_id"><h4>เลขบัตรประชาชน (ตัวเลขเท่านั้น):</h4></label>
                                                <input class="form-control" name = "document_id" id="document_id" type="number" required value="{{ old('document_id') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-9">
                                            <font color=#FF0033><label name = "document_error" id = "document_error"></label></font>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <div class="col-xs-9" align = "center">
                                                    <button type="button" name = "button" id = "button" class="btn btn-primary btn-lg" data-loading-text="<i class='fa fa-spinner fa-spin '></i> กำลังค้นหาข้อมูล" onClick="check()">ตรวจสอบ</button>
                                                <br/><br/><br/>
                                            </div>    
                                        </div>
                                    </div>  
                                    <div class="row"></div>
                                </div>
                                <div class = "modal-body" id = "panel">
                                       <form action="/register" method="POST" >
                                       <input type="hidden" name = "_token" id = "token" value ="{{csrf_token()}}">
                                            <input type="text" name = "username" id ="username" value="{{ old('username') }}">
                                            <button type="submit" name = "button" id = "button" class="btn btn-primary btn-lg" >ตกลง</button>
                                        </form>
                                </div>
                                <div class="row"></div>
                        </div>
                </div>  
        </div>
    </div>
</div>
<script src='/js/new_js/jquery.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='/js/new_js/bootstrap.min.js'></script>
<script src="{{ url('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.4.5/js/bootstrapValidator.js') }}"></script>
<script language="JavaScript"   src="/js/new_js/check.js"></script>
<script>
@if (session('status') )
$("#flip").hide();
$("#panel").show();
@endif
</script>
</body>
</html>
