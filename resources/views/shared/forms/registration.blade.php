<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href={{ asset('reg/css/montserrat-font.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('reg/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}>
    <!-- Main Style Css -->
    <link rel="stylesheet" href={{ asset('reg/css/style.css') }} />
</head>

<body class="form-v10">
    <div class="page-content">
        <div class="form-v10-content">
            <form class="form-detail" action="{{ route('create-user') }}" method="post" id="myform"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-left">
                    <h2>Registration Form</h2>
                    <!-- Validation error messages -->
                    @if ($errors->any())
                        <div style="color: red; margin-left:12px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-row">
                        <select name="role">
                            <option class="option" value="user">User</option>
                            <option class="option" value="owner">Owner</option>
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>
                    <div class="form-row">
                        <input type="text" name="name" id="name" class="input-text" placeholder="Your Name"
                            required>
                    </div>
                    <div class="form-row">
                        <input type="password" name="password" id="name" class="input-text" placeholder="Password"
                            required>
                    </div>
                    <div class="form-row">
                        <input type="file" name="photo" accept="image/*" class="company" placeholder="Photo"
                            required>
                    </div>
                </div>
                <div class="form-right">
                    <h2>Contact Details</h2>
                    <div class="form-row">
                        <input type="text" name="present_address" class="street" id="street"
                            placeholder="Present Address" required>
                    </div>
                    <div class="form-row">
                        <input type="text" name="permanent_address" class="additional" id="additional"
                            placeholder="Permanent Addresss" required>
                    </div>
                    <div class="form-row">
                        <select name="country">
                            <option value="country">Country</option>
                            <option value="Bangladesh">Bangladesh</option>
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>

                    <div class="form-row">
                        <input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number"
                            required>
                    </div>

                    <div class="form-row">
                        <input type="text" name="email" id="your_email" class="input-text" required
                            pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
                    </div>
                    <div class="form-checkbox">
                        <label class="container">
                            <p>I do accept the <a href="#" class="text">Terms and Conditions</a> of FBMS.
                            </p>
                            <input type="checkbox" name="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-row-last">
                        <input type="submit" name="register" class="register" value="Register Badge">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
