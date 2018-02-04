<!DOCTYPE html>
<html lang="th-TH">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
    <h1><u>Welcome to Register page in 90s fashion.</u></h1>
    <br />
    <form action="register" method="POST">
        {{ csrf_field() }}
        <label for="ref_id">SAP ID : </label>
        <input type="number" name="ref_id" required value="{{ old('ref_id') }}"> <br />
        <label for="password">PASSWORD : </label>
        <input type="password" name="password" required> <br />
        <label for="password">PASSWORD AGAIN : </label>
        <input type="password" name="re_password" required> <br />
        <hr />
        <input type="submit" value="Register">
    </form>
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
