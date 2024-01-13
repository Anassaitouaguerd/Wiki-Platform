<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/script.css" rel="stylesheet">
    <title>Document</title>
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
     
            <section class="mt-4">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addTageModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    Ajouter Nouvelles Tage
                </button>
                <!-- Modal -->
                <div class="modal fade" id="addTageModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Nouvelles Catégories</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">Nom de Tag</label>
                                    <input type="text" class="form-control" id="tagName" name="tagName">
                                </div>
                                <div class="mb-3 d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary m-0 mx-4" onclick="add_tag()" data-bs-dismiss="modal">Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Name Categories</th>
                        </tr>
                    </thead>
                    <tbody class="t_body">
                        <?php
                        $index = 0;
                        foreach ($getTag as $row) {
                        ?>
                            <tr class="tags" data-index="<?= $index++ ?>">
                                <th scope="row" id="idTage"><?= $row['id'] ?></th>
                                <td id="nameTag"><?= $row['name'] ?></td>
                                <td>
                                    <button type="button" onclick="getIndex(event)" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['id'] ?>" class="m-0 btn btn-primary">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </button>
                                    <button type="button" onclick="delete_tag(event)" class="m-0 btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- start modal update -->
                            <div class="modal fade" id="Modal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Nouvelles Catégories</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="form_up modal-body">

                                            <input type="number" value="<?= $row['id'] ?>" class="form-control" id="tag_id" name="tagID" disabled>
                                            <div class="mb-3">
                                                <label for="categoryName" class="form-label">Nom de tag</label>
                                                <input type="text" value="<?= $row['name'] ?>" class="form-control" id="tag_name" name="categoryName">
                                            </div>
                                            <div class="mb-3 d-flex justify-content-center align-items-center">
                                                <button type="submit" class="btn btn-primary m-0 mx-4" onclick="update_tag(event)" data-bs-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </section>
        <?php
        include("../Views/partials/_footer.php");
        ?>
        </div>
        </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
        <script>
            function add_tag() {
                const value_name = document.getElementById("tagName").value;
                const req = new XMLHttpRequest();
                req.open("POST", "add_tag");
                req.setRequestHeader("Content-type", "Application/json");
                req.send(JSON.stringify(value_name));
                req.onreadystatechange = () => {
                    if (req.status === 200 && req.readyState === 4) {
                        const res = JSON.parse(req.responseText);
                        console.log(res);
                        for (let i = 0; i < res.length; i++) {
                            document.querySelector(".t_body").insertAdjacentHTML('beforeend', `
                <tr class="tags" data-index="<?= $index++ ?>">
                        <th scope="row" id="idTage">${res[i]['id']}</th>
                        <td id="nameTag">${res[i]['name']}</td>
                        <td>     
                        <button type="button" onclick="getIndex(event)" data-bs-toggle="modal" data-bs-target="#Modal${res[i]['id']}" class="m-0 btn btn-primary">
                          <i class="bi bi-pencil-fill"></i> Edit
                        </button>
                        <button type="button" onclick="delete_tag(event)" class="m-0 btn btn-danger">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                        </td>
                      </tr>
                      <!-- start modal update -->
                  <div class="modal fade" id="Modal${res[i]['id']}" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Nouvelles Catégories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="form_up modal-body">              

                        <input type="number" value="${res[i]['id']}" class="form-control" id="tag_id" name="tagID" disabled>
                          <div class="mb-3">
                            <label for="categoryName" class="form-label">Nom de tag</label>
                            <input type="text" value="${res[i]['name']}" class="form-control" id="tag_name" name="tag_name">
                          </div>
                          <div class="mb-3 d-flex justify-content-center align-items-center">
                          <button type="submit" class="btn btn-primary m-0 mx-4" onclick="update_tag(event)" data-bs-dismiss="modal">Save</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>

                      </div>
                    </div>
                  </div>
                </div>
                `);
                        }
                    }
                };
            }

            function update_tag(e) {
                const value_id = e.currentTarget.closest('.form_up').querySelector("#tag_id").value;
                const value_name = e.currentTarget.closest('.form_up').querySelector("#tag_name").value;
                const data = {
                    id: value_id,
                    name: value_name
                };
                const req = new XMLHttpRequest();
                req.open("POST", "update_Tag");
                req.setRequestHeader("Content-type", "Application/json");
                req.send(JSON.stringify(data));
                req.onreadystatechange = () => {
                    if (req.status == 200 && req.readyState == 4) {
                        const res = JSON.parse(req.responseText);
                        if (res === true) {

                            const trcollection = document.getElementsByClassName("tags");
                            const trfound = Object.values(trcollection).filter((item) => item.dataset.index == index_row);
                            trfound[0].querySelector("#nameTag").textContent = value_name;
                        }
                    }
                }
            }

            function delete_tag(e) {
                const TRparent = e.currentTarget.closest("tr");
                const idTags = TRparent.querySelector("#idTage").textContent;
                const req = new XMLHttpRequest();
                req.open("POST", "delet_tag");
                req.setRequestHeader("Content-type", "Application/json");
                req.send(JSON.stringify(idTags));
                req.onreadystatechange = () => {
                    if (req.status == 200 && req.readyState == 4) {
                        const res = JSON.parse(req.responseText);
                        console.log(res);
                        if (res == true) {
                            TRparent.remove();
                        }
                    }
                }
            }
        </script>
</body>

</html>