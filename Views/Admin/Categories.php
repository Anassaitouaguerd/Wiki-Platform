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
    <main class="tm-main ">

    <section class="mt-4">
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
          </svg>
          Ajouter Nouvelles Catégories
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Nouvelles Catégories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- <form action="" method="POST"> -->
                <div class="mb-3">
                  <label for="categoryName" class="form-label">Nom de la catégorie</label>
                  <input type="text" class="form-control" id="categoryName" name="categoryName">
                </div>
                <div class="mb-3 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-primary m-0 mx-4" onclick="add_categorie()" data-bs-dismiss="modal">Save</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <!-- </form> -->
              </div>
            </div>
          </div>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#Id</th>
              <th scope="col">Name Categories</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="t_body">
            <?php
            $index = 0;
            foreach ($getCategorie as $row) {
            ?>
              <tr class="categories" data-index="<?= $index++ ?>">
                <th scope="row" id="IDCategorie"><?= $row['id_categorie'] ?></th>
                <td id="nameCategorie"><?= $row['name'] ?></td>
                <td>
                  <button type="button" onclick="getIndex(event)" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['id_categorie'] ?>" class="m-0 btn btn-primary">
                    <i class="bi bi-pencil-fill"></i> Edit
                  </button>
                  <button type="button" onclick="deleteRow(event)" class="m-0 btn btn-danger">
                    <i class="bi bi-trash-fill"></i> Delete
                  </button>
                </td>
              </tr>
              <!-- start modal update -->
              <div class="modal fade" id="Modal<?= $row['id_categorie'] ?>" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Nouvelles Catégories</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="form_up modal-body">

                      <input type="number" value="<?= $row['id_categorie'] ?>" class="form-control" id="categoryid" name="categoryid" disabled>
                      <div class="mb-3">
                        <label for="categoryName" class="form-label">Nom de la catégorie</label>
                        <input type="text" value="<?= $row['name'] ?>" class="form-control" id="categoryName_up" name="categoryName">
                      </div>
                      <div class="mb-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary m-0 mx-4" onclick="update_categorie(event)" data-bs-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
            <input type="hidden" class="total_rows" value="<?= $index ?>">
          </tbody>

        </table>
      </section>
      <?php
            include("../Views/partials/_footer.php");
            ?>
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>