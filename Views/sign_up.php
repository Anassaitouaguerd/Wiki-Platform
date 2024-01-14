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
            <?php include("partials/_navbar.php"); 
            $_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(32));
            ?>
    <div class="container">
    <div class="row form_login">

<div class="panel-heading">
    <h3 class="pt-3 font-weight-bold">Registere</h3>
</div>
        <?php
        if (isset($_SESSION['account_already'])) {
        ?>
            <span class="text-danger">
                <?= $_SESSION['account_already'] ?>
            </span>
        <?php
        }
        unset($_SESSION['account_already']);
        ?>
        <form id="form">
            <input type="hidden" name="_token" id="_token" value="<?= $_SESSION['_token']?>">
            <div class="input-control">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Email</label>
                <input id="email" name="email" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
                <div class="error"></div>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/register.js"></script>
</body>

</html>