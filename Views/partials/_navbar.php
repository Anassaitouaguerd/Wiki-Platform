<nav class="tm-nav" id="tm-nav">
    <ul>
        <li class="tm-nav-item">
            <a href="/" class="tm-nav-link">
                <i class="fas fa-home"></i>
                Blog Home
            </a>
        </li>
        <li class="tm-nav-item">
            <a href="post.html" class="tm-nav-link">
                <i class="fas fa-pen"></i>
                Single Post
            </a>
        </li>
        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] === "admin") {
        ?>

                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="dashboard">
                        <i class="fas fa-home"></i>
                        Dashboard</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="categorie">
                        <i class="fas fa-home"></i>
                        Gestion Categorie</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="gestion_Tags">
                        <i class="fas fa-home"></i>
                        Gestion Tags</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="wiki_archive">
                        <i class="fas fa-home"></i>
                        Wiki Archive</a>
                </li>
                <li class="nav-item px-4">
                    <a class="tm-nav-link" href="log_out">
                        <i class="fas fa-home"></i>
                        Log Out</a>
                </li>

            <?php
            } elseif ($_SESSION['role'] === "author") {
            ?>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="dashboard">
                        <i class="fas fa-home"></i>
                        Dashboard</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="gestion_wikis">
                        <i class="fas fa-home"></i>
                        Gestion Wikis</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="log_out">
                        <i class="fas fa-home"></i>
                        Log Out</a>
                </li>

            <?php
            }
        } else {


            ?>
            <li class="tm-nav-item ">
                <a href="login" class="tm-nav-link" >
                    <i class="fas fa-users"></i>
                    Login
                </a></li>
            <li class="tm-nav-item">
                <a href="sign_up" class="tm-nav-link" >
                    <i class="fas fa-users"></i>
                    register
                </a></li>
        <?php
        }
        ?>
    </ul>
</nav>