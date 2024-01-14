<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xtra Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="assets/css/script.css" rel="stylesheet">
</head>

<body>
  <header class="tm-header" id="tm-header">
    <div class="tm-header-wrapper">
      <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <?php include("../Views/partials/_navbar.php"); ?>
    </div>
  </header>
  <div class="container-fluid">
    <main class="tm-main">
  
      <h1>Dashboard</h1>
      <div class="row tm-row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tous les utilisateurs</h5>
              <p class="card-text">Total : <?= $count_users['AllUsers']?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tous les Wikis</h5>
              <p class="card-text">Total : <?= $count_wikis['Allwikis']?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tous les Categories</h5>
              <p class="card-text">Total : <?= $count_allCategorie['AllCategorie']?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tous les Tags</h5>
              <p class="card-text">Total : <?= $count_tags['AllTag']?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
  include("../Views/partials/_footer.php");
  ?>
    </div>
  </main>
</div>
  <script src="js/jquery.min.js"></script>
  <script src="js/templatemo-script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>