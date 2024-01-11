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
                    foreach ($all_myWiki as $rows) {
                    ?>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="d-flex flex-row-reverse align-item-ceneter mt-4">
                                    <button class="btn btn-primary mx-4 mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                        </svg>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal<?= $rows['id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="card-body">
                                    <h2 class="card-title p-4"><?= $rows['title'] ?></h2>
                                    <p class="card-text p-4"><?= (strlen($rows['content']) > 100) ? substr($rows['content'], 0, 100) . '...' :  $rows['content'] ?></p>
                                    <p class="card-text p-4"><small class="text-muted">Created At : <?= $rows['createdAt'] ?></small></p>
                                </div>
                            </div>
                        </div>
                        <!-- ======== model confirmation delete ======================= -->
                        <div class="modal fade" id="Modal<?= $rows['id'] ?>">
                            <div class="modal-dialog d-flex align-items-center justify-content-center">
                                <div class="modal-content" style="background-color: black; color: white;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: none; border: none;">
                                            <span aria-hidden="true">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal">No</button>
                                    <form action="delet_wiki" method="POST">
                                        <input type="hidden" value="<?= $rows['id'] ?>" name="wiki_id">
                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ================= end modal ============================= -->
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