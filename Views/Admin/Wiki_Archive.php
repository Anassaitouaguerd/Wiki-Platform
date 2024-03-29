<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/script.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="assets/js/texteria.js"></script>
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
            <!-- Article Section -->
            <section class="articles">
                <div class="row">
                    <!-- Static content without PHP -->
                    <?php
                    if ($getwiki) {
                        foreach ($getwiki as $rows) {
                    ?>

                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <form action="disarchiver" method="POST">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="hidden" name="wiki_id" value="<?= $rows['id'] ?>">
                                            <button type="submit" name="disarchiver" class="btn btn-success">
                                                Disarchiver
                                            </button>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        <h2 class="card-title p-4"><?= $rows['title'] ?></h2>
                                        <h4 class="card-title p-4"><?= $rows['description'] ?></h4>
                                        <p class="card-text p-4"><?= (strlen($rows['content']) > 100) ? substr($rows['content'], 0, 100) . '...' :  $rows['content'] ?></p>
                                        <p class="card-text p-4"><small class="text-muted">Created At : <?= $rows['createdAt'] ?></small></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h4 class="card-title p-4">il n'y a pas wiki archiver !!!</h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
            <?php
            include("../Views/partials/_footer.php");
            ?>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>