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
            @if (session('success'))
                <p id="success" class="text-center" style="color: rgb(247, 254, 28)">{{ session('success') }}</p>
            @endif
            @if (session('failure'))
                <p id="failure" class="text-center" style="color: rgb(247, 254, 28)">{{ session('failure') }}</p>
            @endif

        </div>
        @if (session('loginError'))
            <p id="loginError" style="color: rgb(239, 224, 10); text-align:center">{{ session('loginError') }}</p>
        @endif
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
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
            <button type="submit">Login</button>
        </form>
        <div class="message">Don't have an account? <a href="{{ route('registration') }}"
                style="color: greenyellow">Register Now</a></div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the success message element exists
            var successMessage = document.getElementById("success");
            if (successMessage) {
                // Remove the success message after 3 seconds
                setTimeout(function() {
                    successMessage.remove();
                }, 3000);
            }

            // Check if the failure message element exists
            var failureMessage = document.getElementById("failure");
            if (failureMessage) {
                // Remove the failure message after 3 seconds
                setTimeout(function() {
                    failureMessage.remove();
                }, 3000);
            }
            var loginError = document.getElementById("loginError");
            if (loginError) {
                // Remove the failure message after 3 seconds
                setTimeout(function() {
                    loginError.remove();
                }, 3000);
            }
        });
    </script>
</body>

</html>
