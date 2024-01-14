<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="assets/css/script.css" rel="stylesheet">
    <title>Article Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        article {
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
        }

        time {
            color: #777;
        }

        p {
            line-height: 1.6;
            color: #555;
        }
        .tag{
            border-radius: 3px;

        }
    </style>
</head>

<body>

    <?php include("../Views/partials/_navbar.php"); ?>

    <main <?php echo (isset($_SESSION['role'])) ? 'style="margin-left: 30%;"' : '' ?> >

        <article>
            <h1><?= $getContent['title'] ?></h1>
            <p>Published on: <time><?= $getContent['createdAt'] ?></time></p>
            <p>Author: <?= $getContent['username'] ?></p>

            <div>
                <p><?= $getContent['content'] ?></p>
            </div>
            <div class="mt-25">
                <h2> Categorie </h2>
                <h3>
                    <p><?= $getContent['name'] ?></p>
                </h3>
            </div>
            <h2> Tags </h2>
            <div class="mt-25 d-flex">
               
                    <?php
                    $i = 0;
                    foreach ($getTags as $rows[$i]) {
                    ?>
                        <!-- Assuming $rows is an array and $i is the index -->
                        <div class="tag bg-secondary m-4 text-light p-2">
                                <p class="card-title"><?= $rows[$i]['name'] ?></p>
                        </div>

                    <?php
                        $i++;
                    }
                    ?>
                
            </div>
        </article>
    </main>
<script src="js/templatemo-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>