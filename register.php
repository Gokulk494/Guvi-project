<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            width: 300px;
        }

        .register-button {
            margin-top: 20px;
        }

        .back-button {
            margin-top: 10px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#register").submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                var data = {
                    name: $("#name").val(),
                    username: $("#username").val(),
                    password: $("#password").val(),
                    action: "register",
                };

                $.ajax({
                    url: 'function.php',
                    type: 'post',
                    data: data,
                    success: function (response) {
                        console.log(response.trim());
                        if (response.trim() === "Registration Successful") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Registration Successful!',
                                text: 'You will now be redirected to login.',
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    window.location.href = 'login.php';
                                }
                            });
                        } else {
                            alert(response.trim()); // Display error message
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Register</h2>
            <form id="register">
                <input type="hidden" id="action" value="register">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" class="form-control" required>
                </div>
                <!-- Add the register-button class to the button for Bootstrap styling -->
                <button type="submit" class="btn btn-primary register-button btn-block">Register</button>
            </form>
            <br>
            <a href="login.php" class="btn btn-secondary back-button btn-block">Go to Login</a>
        </div>
    </div>
</body>
</html>
