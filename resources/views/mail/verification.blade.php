<!DOCTYPE html>
<html lang="en">

<body>

    <p>Dear {{$user->name}},</p>
    <p>Your account has been created. please click the following link to activate your account.</p>

    <!-- for some reason Redis server( use Queue) can not access name route(web.php) thats why we use full URL -->
    <a href="http://localhost:8080/Laravel_WebServices/public/verify/{{ $user->email_verification_token }}" >{{$user->email_verification_token}}</a>
    <br>
    <p>Thanks for the Registration</p>
</body>
</html>