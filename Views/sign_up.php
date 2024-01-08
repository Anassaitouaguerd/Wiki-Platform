<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/script.css" rel="stylesheet">
    <title>Sign up</title>
</head>
<body>
<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
           <?php include ("partials/_navbar.php") ;?>
        </div>
    </header>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Sign up</h3>
                </div>
                <div class="panel-body p-3">
                <?php
                    if(isset($_SESSION['account_already']))
                    {
                    ?>
                    <span class="text-danger">
                        <?= $_SESSION['account_already'] ?>
                    </span>
                    <?php
                    }unset($_SESSION['account_already']);
                    ?>
                    <form action="signup_controller" method="POST">
                        <div class="form-group py-2">
                            <div class="input-field"> 
                                <input class="login_input" type="text" name="username" placeholder="Username" required> </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field"> 
                                <input class="login_input" type="email" name="email" placeholder="Email" required> </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field">
                                 <input class="login_input" type="password" name="password" placeholder="Enter your Password" required>
                             <button class="btn bg-white text-muted">
                                 <span class="far fa-eye-slash"></span>
                             </button>
                            </div>
                        </div>
                        <button type="submit" class="no-background" name="save">
                            <div class="btn btn-primary btn-block mt-3">Sign up</div>
                        </button>
                        <div class="text-center pt-4 text-muted">Don't have an account? <a href="login">Login</a> </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>