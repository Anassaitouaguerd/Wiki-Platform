<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/script.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
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
            <form action="update_wiki" method="POST">
                <h1>Title Wiki</h1>

                <input type="hidden" name="id_wiki" value="<?= $getwiki['id'] ?>">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" value="<?= $getwiki['title'] ?>" name="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" value="<?= $getwiki['description'] ?>" name="description" placeholder="Enter Description">
                </div>
                <div class="d-flex">
                    <div class="w-50 mt-4">
                        <label for="categorie" class="ms-4">Categories</label>
                        <select id="select-categorie" name="categorie_wiki" multiple class="form-control ml-1" placeholder="Select a Categorie..." autocomplete="off">
                            <option value="">Select a person...</option>
                            <?php

                            foreach ($getallCategorie as $rows) {
                            ?>
                                <option value="<?= $rows['id_categorie'] ?>"><?= $rows['name'] ?></option>
                            <?php
                            } ?>

                        </select>
                    </div>
                    <div class="w-50 mt-4">
                        <label for="Tags" class="ms-4">Tags</label>
                        <select id="select-tags" name="tags[]" multiple class="form-control ml-1" placeholder="Select a Tags..." autocomplete="off">
                            <option value="">Select a person...</option>
                            <?php
                            foreach ($tags_to_wiki as $tags_selected) {
                            ?>
                                <option value="<?= $tags_selected['id'] ?>" selected><?= $tags_selected['name'] ?></option>

                            <?php
                            }
                            ?>
                            <?php
                            foreach ($allTags as $rows) {
                            ?>
                                <option value="<?= $rows['id'] ?>"><?= $rows['name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>


                <h2 class="mt-4">Content</h2>
                <textarea id="tiny" name="article"><?= $getwiki['content'] ?></textarea>
                <div class="w-100 d-flex flex-row-reverse">
                    <button type="submit" class="w-50 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                            <path d="M13 14v-3H3v3h10zm1-4V3a1 1 0 0 0-1-1H8.5V0h-1v2.5H3a1 1 0 0 0-1 1v7h2V4h8v6h2zM7 7h2v2H7V7z" />
                        </svg>
                        Save
                    </button>
                </div>
            </form>

    </div>
    </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect("#select-tags", {
            maxItems: 5
        });
        new TomSelect("#select-categorie", {
            maxItems: 1
        });
    </script>
</body>

</html>