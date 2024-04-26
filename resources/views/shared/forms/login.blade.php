<!DOCTYPE html>
<!--www.codingflicks.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login FBMS</title>
    <link rel="stylesheet" href={{ asset('home/css/login.css') }}>
</head>

<body>
    <div class="form-box">
        <div class="header-text">
            Login Form
        </div>
        <input name="email" placeholder="Your Email Address" type="text">
        <input name="password" placeholder="Your Password" type="password">
        <select name="role" id="userType">
            <option value="user">User</option>
            <option value="owner">Owner</option>
            <option value="admin">Admin</option>
        </select>
        <input id="terms" type="checkbox">
        <label for="terms"></label>
        <span>Agree with <a href="#">Terms & Conditions</a></span>
        <button>Login</button>
        <div class="message">Don't have an account? <a href="{{ route('registration') }}"
                style="color: greenyellow">Register Now</a></div>
    </div>
</body>

</html>
