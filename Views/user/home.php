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
</head>

<body>


    <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <?php include("../Views/partials/_navbar.php"); ?>


    <div class="container-fluid">
        <main class="<?php echo (isset($_SESSION['role'])) ? 'tm-main' : 'm-0'; ?>">
            <!-- Search form -->
            <div class="">
                <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                    <form class="ms-4 d-flex justify-content-between align-items-center" id="search_form" oninput="search(event)">
                        <div class="input-group search mx-2">
                            <input type="text" class="form-control" placeholder="Search...Wiki" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group search mx-2">
                            <input type="text" class="form-control" placeholder="Search...Categorie" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </form>
                    <div class="select_tag">
                        <select id="select-tags" name="tags" multiple class="form-control ml-1" placeholder="Search a Tags..." autocomplete="off">
                            <option value="">Select a person...</option>
                            <?php
                            foreach ($alltags as $rows) {
                            ?>
                                <option value="<?= $rows['id'] ?>"># <?= $rows['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div id="parentArticle" class="d-flex flex-column align-items-center">

                </div>
                <div class="w-100 d-flex justify-content-center">

                    <button type="button" class="btn btn-primary" name="showMore" onclick="showMore()">
                        Show More
                    </button>
                </div>



            </div>
                <?php
                include("../Views/partials/_footer.php");
                ?>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script>
        let page = 1;

        function search(e) {
            const parentArticle = document.querySelector("#parentArticle");
            parentArticle.innerHTML = "";
            const getInputs = e.currentTarget.querySelectorAll("input");
            const wikiVlaue = getInputs[0].value;
            const categorieValue = getInputs[1].value;
            const data = {
                wiki: wikiVlaue,
                categorie: categorieValue,
                showMore: page
            };
            const req = new XMLHttpRequest();
            req.open("POST", "search");
            req.setRequestHeader("Content-type", "Application/json");
            req.send(JSON.stringify(data));
            req.onreadystatechange = () => {
                if (req.readyState == 4 && req.status == 200) {
                    const res = JSON.parse(req.responseText);
                    if (!res) return;
                    for (let i = 0; i < res.length; i++) {
                        parentArticle.insertAdjacentHTML("beforeend", `
                        <article class="col-12 col-md-6 tm-post">
                        <hr class="tm-hr-primary">
                        <?php
                        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin")
                        {
                        ?>
                        <div class="d-flex flex-row-reverse">
                        <form action="archive_wiki" method="POST">
                        <input type="hidden" name="wiki_id" value="${res[i]['id']}" />
                          <button type="submit" class="btn btn-danger">
                        Archive
                        </button>
                        </form>
                        </div>
                        <?php }?>
                    <a href="aficher_article?id=${res[i]['id']}" class="effect-lily tm-post-link tm-pt-60">
                        <h2 class="tm-pt-30 tm-color-dark tm-post-title">${res[i]['title']}</h2>
                    <p class="tm-pt-30">
                    ${res[i]['description']}
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-dark">${res[i]['name']}</span>
                        <span class="tm-color-dark">${res[i]['createdAt']} </span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>36 comments</span>
                        <span>by Admin Nat</span>
                    </div>
                    </a>  
                </article>
                        
                        `);
                    }
                }
            }

        }
        search
            ({
                currentTarget: document.getElementById("search_form")
            });

        function showMore() {
            
            page++;
            search
                ({
                    currentTarget: document.getElementById("search_form")
                });

        }
        new TomSelect("#select-tags", {
            maxItems: 1
        });

    </script>

</body>

</html>