<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 10;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="radio"] {
            width: auto;
        }
        .form-group .error {
            color: red;
            font-size: 0.875em;
        }
        .form-group .captcha {
            display: flex;
            justify-content: space-between;
        }
        .form-group .captcha img {
            height: 36px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- registered successfully -->
        <!-- Check if a success message exists in the session and display it -->
        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
        @endif

        <form id="registrationForm" action="/store" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
                <div class="error" id="nameError"></div>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <label><input type="radio" name="gender" value="male"> Male</label>
                <label><input type="radio" name="gender" value="female"> Female</label>
                <div class="error" id="genderError"></div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <div class="error" id="emailError"></div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <div class="error" id="passwordError"></div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
                <div class="error" id="confirmPasswordError"></div>
            </div>
            <div class="form-group">
                <label for="phone">Phone No</label>
                <input type="text" id="phone" name="phone">
                <div class="error" id="phoneError"></div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address">
                <div class="error" id="addressError"></div>
            </div>
            <div class="form-group">
                <label for="pincode">Pincode</label>
                <input type="text" id="pincode" name="pincode">
                <div class="error" id="pincodeError"></div>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="">Select Country</option>
                    <option value="us">United States</option>
                    <option value="uk">United Kingdom</option>
                    <option value="ca">Canada</option>
                    <!-- Add more countries as needed -->
                </select>
                <div class="error" id="countryError"></div>
            </div>
            <div class="form-group">
                <label for="captcha">Captcha</label>
                <div class="captcha">
                    <input type="text" id="captcha" name="captcha">
                    <img src="captcha.jpg" alt="Captcha">
                </div>
                <div class="error" id="captchaError"></div>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
    <!-- <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var isValid = true;

            var name = document.getElementById('name').value.trim();
            var gender = document.querySelector('input[name="gender"]:checked');
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value.trim();
            var confirmPassword = document.getElementById('confirmPassword').value.trim();
            var phone = document.getElementById('phone').value.trim();
            var address = document.getElementById('address').value.trim();
            var pincode = document.getElementById('pincode').value.trim();
            var country = document.getElementById('country').value;
            var captcha = document.getElementById('captcha').value.trim();

            if (name === "") {
                isValid = false;
                document.getElementById('nameError').innerText = "Name is required.";
            } else {
                document.getElementById('nameError').innerText = "";
            }

            if (!gender) {
                isValid = false;
                document.getElementById('genderError').innerText = "Gender is required.";
            } else {
                document.getElementById('genderError').innerText = "";
            }

            if (email === "") {
                isValid = false;
                document.getElementById('emailError').innerText = "Email is required.";
            } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                isValid = false;
                document.getElementById('emailError').innerText = "Email is invalid.";
            } else {
                document.getElementById('emailError').innerText = "";
            }

            if (password === "") {
                isValid = false;
                document.getElementById('passwordError').innerText = "Password is required.";
            } else {
                document.getElementById('passwordError').innerText = "";
            }

            if (confirmPassword === "") {
                isValid = false;
                document.getElementById('confirmPasswordError').innerText = "Confirm password is required.";
            } else if (password !== confirmPassword) {
                isValid = false;
                document.getElementById('confirmPasswordError').innerText = "Passwords do not match.";
            } else {
                document.getElementById('confirmPasswordError').innerText = "";
            }

            if (phone === "") {
                isValid = false;
                document.getElementById('phoneError').innerText = "Phone number is required.";
            } else if (!/^\d{10}$/.test(phone)) {
                isValid = false;
                document.getElementById('phoneError').innerText = "Phone number is invalid.";
            } else {
                document.getElementById('phoneError').innerText = "";
            }

            if (address === "") {
                isValid = false;
                document.getElementById('addressError').innerText = "Address is required.";
            } else {
                document.getElementById('addressError').innerText = "";
            }

            if (pincode === "") {
                isValid = false;
                document.getElementById('pincodeError').innerText = "Pincode is required.";
            } else if (!/^\d{6}$/.test(pincode)) {
                isValid = false;
                document.getElementById('pincodeError').innerText = "Pincode is invalid.";
            } else {
                document.getElementById('pincodeError').innerText = "";
            }

            if (country === "") {
                isValid = false;
                document.getElementById('countryError').innerText = "Country is required.";
            } else {
                document.getElementById('countryError').innerText = "";
            }

            if (captcha === "") {
                isValid = false;
                document.getElementById('captchaError').innerText = "Captcha is required.";
            } else {
                document.getElementById('captchaError').innerText = "";
            }

            if (isValid) {
                alert("Registration successful!");
                // Here you can add code to submit the form data to the server
            }
        });
    </script> -->
</body>
</html>
