<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/script.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

           <?php include ("partials/_navbar.php") ;?>
       
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Login</h3>
                </div>
                <div class="panel-body p-3">
                    <?php
                    if(isset($_SESSION['message']))
                    {
                    ?>
                    <span class="text-danger">
                        <?= $_SESSION['message'] ?>
                    </span>
                    <?php
                    }
                    unset($_SESSION['message']);
                    ?>
                    <form action="login_controller" method="POST">
                        <div class="form-group py-2">
                            <div class="input-field"> 
                                <input class="login_input" type="email" placeholder="Enter your Email" onkeydown="email_validation(event)" name="email" required> </div>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <input class="login_input" type="password" placeholder="Enter your Password" onkeydown="pass_validation(event)" name="password" required>
                                </div>
                            </div>
                            <p class="messageValid" ></p>
                        <button type="submit" name="login" class="btn_submit btn btn-primary w-50 mt-3">
                            Login
                        </button>
                    </form>
                    <div class="text-center pt-4 text-muted">Don't have an account?
                        <a href="sign_up">Sign up</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</body>
</html>