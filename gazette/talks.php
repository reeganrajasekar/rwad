<?php require("../admin/layout/db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RWAD CLUB</title>
    <link rel="shortcut icon" href="/static/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/static/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="header">
        <div class="container-fluid">
            <a class="navbar-brand d-lg-none" href="#"><img src="/static/img/logo.png" style="height:40px" alt="Logo">&ensp;RWAD CLUB</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/sponsored.php">Sponsored By RWAD</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        RWAD Gazette
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="/gazette/talks.php">RWAD Talks</a></li>
                            <li><a class="dropdown-item" href="/gazette/xworldcup.php">RWAD X World Cup</a></li>
                            <li><a class="dropdown-item" href="/gazette/xwinter.php">RWAD X PMU Winter</a></li>
                            <li><a class="dropdown-item" href="/gazette/ci.php">RWAD Community Initiative</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  rounded" style="color:#3b486f;background-color:white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Join / Login
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/entrepreneurs">Entrepreneurs</a></li>
                            <li><a class="dropdown-item" href="/entrepreneurs">Speakers</a></li>
                            <li><a class="dropdown-item" href="/member">Members Login</a></li>
                            <li><a class="dropdown-item" href="/admin">Admin Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand d-none d-lg-block" href="#"><img src="/static/img/logo.png" style="height:40px" alt="Logo">&ensp;RWAD CLUB</a>
        </div>
    </nav>

    <div class="img_hold gaz_bg">
        <h2>RWAD Talks</h2>
    </div>
    <main >
        <section class="container py-4">
            <div class="row">
            <?php
            $sql = "SELECT * FROM gaz WHERE type='RWAD Talks' order by date DESC LIMIT 6";
            $result = $conn->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
            ?>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card w-100">
                        <img loading="lazy" src="/static/uploads/<?php echo($row["img"]) ?>" class=" card-img-top" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo($row["title"]) ?></h5>
                            <p class="card-text"><?php echo($row["data"]) ?></p>
                            <div class="text-end">
                                <a href="<?php echo($row["link"]) ?>" target="blank">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            }else{
            ?>
            <h4 class="mt-4 text-center text-secondary">Nothing Found!</h4>
            <?php
            }
            ?>
            </div>
        </section>
        <section class="box-1">
            <h5 class="container py-4">
                Visit our social media accounts: instagram and tiktok @rwadpmu
                <br><br>
                &copy; <script>document.write(new Date().getFullYear())</script>, Rwad.com
            </h5>
        </section>
    </main>

    <script src="/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/static/js/main.js"></script>
</body>
</html>