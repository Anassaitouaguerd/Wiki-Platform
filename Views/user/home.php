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
                    <form method="GET" class="d-flex justify-content-between align-items-center" oninput="search()">                
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
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
                        <span class="position-absolute tm-new-badge">New</span>
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">Multi-purpose blog template</h2>
                    </a>                    
                    <p class="tm-pt-30">
                        <a rel="nofollow" href="https://templatemo.com/tm-553-xtra-blog" target="_blank">Xtra Blog</a>  is a multi-purpose HTML CSS template from TemplateMo website. 
                        Blog list, single post, about, contact pages are included. Left sidebar fixed width and content area is a fluid full-width.
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">Creative . Design . Business</span>
                        <span class="tm-color-primary">June 16, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>48 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-20">
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">How can you apply Xtra Blog</h2>
                    </a>                    
                    <p class="tm-pt-30">
                        You are <u>allowed</u> to convert this template as any kind of CMS theme or template for your custom website builder. 
                        You can also use this for your clients. Thank you for choosing us.
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">Music . Audio</span>
                        <span class="tm-color-primary">June 11, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>24 comments</span>
                        <span>by John Walker</span>
                    </div>
                </article>
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-20">
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">A little restriction to apply</h2>
                    </a>                    
                    <p class="tm-pt-30">
                        You are <u>not allowed</u> to re-distribute this template as a downloadable ZIP file on any template collection
                        website. This is strongly prohibited as we worked hard for this template. Please contact TemplateMo for more information.
                		<br>For example, <a href="https://www.free-css.com/free-css-templates/page272/xtra-blog" target="_blank">Free-CSS</a> redistributed this Xtra Blog template on their website without asking any permission. It is an illegal act by Free-CSS website doing an unauthorized reposting.</p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">Artworks . Design</span>
                        <span class="tm-color-primary">June 4, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>72 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-20">
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">Color hexa values of Xtra Blog</h2>
                    </a>                    
                    <p class="tm-pt-30">
                        If you wish to kindly support us, please contact us or contribute a small PayPal amount to info [at] templatemo.com that is helpful for us.
                        <br>
                        Title #099 New #0CC <br>
                        <span class="tm-color-primary">Text #999 Line #CCC Next #0CC Prev #F0F0F0</span>
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">Creative . Video . Audio</span>
                        <span class="tm-color-primary">May 31, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>84 comments</span>
                        <span>by Admin Sam</span>
                    </div>
                </article>
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="post.html" class="effect-lily tm-post-link tm-pt-20">
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">Donec convallis varius risus</h2>
                    </a>                    
                    <p class="tm-pt-30">
                        Quisque id ipsum vel sem maximus vulputate sed quis velit. Nunc vel turpis eget orci elementum cursus vitae in eros. Quisque vulputate nulla ut dolor consectetur luctus.
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">Visual . Artworks</span>
                        <span class="tm-color-primary">June 16, 2020</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>96 comments</span>
                        <span>by Admin Sam</span>
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
</body>
</html>