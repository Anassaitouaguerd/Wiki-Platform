<nav class="tm-nav" id="tm-nav">
    <ul>
        <li class="tm-nav-item">
            <a href="/" class="tm-nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door mx-4" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                </svg>
                Blog Home
            </a>

        </li>
        <li class="tm-nav-item">
            <a href="post.html" class="tm-nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-stickies-fill mx-4" viewBox="0 0 16 16">
                    <path d="M0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5A1.5 1.5 0 0 0 0 1.5" />
                    <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2zm6 8.5a1 1 0 0 1 1-1h4.396a.25.25 0 0 1 .177.427l-5.146 5.146a.25.25 0 0 1-.427-.177z" />
                </svg>
                Single Post
            </a>
        </li>
        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] === "admin") {
        ?>

                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bar-chart-line mx-4" viewBox="0 0 16 16">
                            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z" />
                        </svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bar-chart-line mx-4" viewBox="0 0 16 16">
                            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z" />
                        </svg>
                        Dashboard</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="my_wikis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-lines-fill mx-4" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                        </svg>
                        My Wiki</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="gestion_wikis">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-kanban mx-4" viewBox="0 0 16 16">
                            <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1z" />
                        </svg>
                        Gestion Wikis</a>
                </li>
                <li class="tm-nav-item">
                    <a class="tm-nav-link" href="log_out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-left mx-4" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                        </svg>
                        Log Out</a>
                </li>

            <?php
            }
        } else {


            ?>
            <li class="tm-nav-item ">
                <a href="login" class="tm-nav-link">
                    <<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-open mx-4" viewBox="0 0 16 16">
                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z" />
                        </svg>
                        Login
                </a>
            </li>
            <li class="tm-nav-item">
                <a href="sign_up" class="tm-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-closed-fill mx-4" viewBox="0 0 16 16">
                        <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                    register
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>