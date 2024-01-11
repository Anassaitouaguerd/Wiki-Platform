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
           <?php include ("../Views/partials/_navbar.php") ;?>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="d-flex justify-content-between align-items-center" oninput="search(event)">                
                    <div class="input-group search mx-2">
                          <input type="text" class="form-control" placeholder="Search...Wiki" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    <div class="input-group search mx-2">
                          <input type="text" class="form-control" placeholder="Search...Categorie" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    <div class="input-group search mx-2">
                          <input type="text" class="form-control" placeholder="Search...Tags" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group-append ">
                          <button class="btn btn-outline-secondary" type="button">Search</button>
                        </div>
                        
                    </form>
                </div>                
            </div>            
            <div class="row tm-row">
            <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
                    </a>                    
                    <p class="tm-pt-30">
                        There is a clickable image with beautiful hover effect and active title link for each post item. 
                        Left side is a sticky menu bar. Right side is a blog content that will scroll up and down.
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">Travel . Events</span>
                        <span class="tm-color-primary">June 24, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>36 comments</span>
                        <span>by Admin Nat</span>
                    </div>
                </article>
            </div>
        <?php
        include("partials/_footer.php");
        ?>
            </div>            
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script> 
        function search(e)
        {
            const getInputs = e.currentTarget.querySelectorAll("input");
            const wikiVlaue = getInputs[0].value;
            const categorieValue = getInputs[1].value;
            const tagsValue = getInputs[2].value;
            const data = {
                wiki: wikiVlaue,
                categorie: categorieValue,
                tags: tagsValue
            }
            const req = new XMLHttpRequest();
            req.open("POST","search");
            req.setRequestHeader("Content-type","Application/json");
            req.send(JSON.stringify(data));
            req.onreadystatechange = () =>{
                if(req.readyState == 4 && req.status == 200)
                {
                    const res = JSON.parse(req.responseText);
                }
            }
        }
    </script>
</body>
</html>