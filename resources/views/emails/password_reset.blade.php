<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <p>Hello,</p>
    <p>Your OTP for password reset: <strong>{{ $otp }}</strong></p>
    <p>Use this token in your reset request: {{ $token }}</p>
    <p>This OTP will expire in 10 minutes.</p>
</body>
</html>
