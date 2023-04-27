<?php require("./admin/layout/db.php");?>
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
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/sponsored.php">Sponsored By RWAD</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        RWAD Gazette
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/gazette/talks.php">RWAD Talks</a></li>
                            <li><a class="dropdown-item" href="/gazette/xworldcup.php">RWAD X World Cup</a></li>
                            <li><a class="dropdown-item" href="/gazette/xwinter.php">RWAD X PMU Winter</a></li>
                            <li><a class="dropdown-item" href="/gazette/ci.php">RWAD Community Initiative</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown rounded" style="background-color:white;">
                        <a class="nav-link dropdown-toggle" style="color:#3b486f" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <div class="img_hold home_bg">
        <h2>RWAD Club</h2>
    </div>
    <main >
        <section class="box">
            <h5 class="container py-5">Rwad was born from the realization of the large amounts of young entrepreneurs that walk <br>through our university hallwayseveryday.</h5>
        </section>
        <section class="join pt-2 container">
            <h3 style="color:#3b486f;font-weight:700">Our Recent Activities</h3>
            <div class="row">
            <?php
            $sql = "SELECT * FROM activities order by id DESC LIMIT 4";
            $result = $conn->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
            ?>
                <article class="col-sm-12 col-md-6 col-lg-3 mb-3" >
                    <div title="" class="card w-100" data-aos="fade-in" data-aos-once="true" >
                        <img loading="lazy" src="/static/uploads/<?php echo($row["img"]) ?>" class=" card-img-top" alt="Event Image">
                        <div class="card-body text-center">
                            <a style="text-decoration:none;color:#444;" >
                                <span class="sjcet-text" style="font-size:16px !important">
                                    <?php echo($row["title"]) ?>
                                </span>
                            </a>
                            <br>
                            <p style="font-size:14px;">
                                <?php echo($row["data"]) ?>
                            </p>
                            <span class="text-muted" style="font-size:14px !important">
                            <?php echo($row["date"]) ?>
                                <script>
                                    document.write(moment("").format('ll'))
                                </script>
                            </span>
                        </div>
                    </div>
                </article>
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
        <section class="join pt-2 container">
            <h3 style="color:#3b486f;font-weight:700">Recent Events</h3>
            <div class="row">
            <?php
            $sql = "SELECT * FROM event order by id DESC LIMIT 4";
            $result = $conn->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
            ?>
                <article class="col-sm-12 col-md-6 col-lg-3 mb-3" >
                    <div title="" class="card w-100" data-aos="fade-in" data-aos-once="true" >
                        <img loading="lazy" src="/static/uploads/<?php echo($row["img"]) ?>" class=" card-img-top" alt="Event Image">
                        <div class="card-body text-center">
                            <a style="text-decoration:none;color:#444;" href="<?php echo($row["link"]) ?>" target="_blank">
                                <span class="sjcet-text" style="font-size:16px !important">
                                    <?php echo($row["title"]) ?>
                                </span>
                            </a>
                            <br>
                            <p style="font-size:14px;">
                                <?php echo($row["data"]) ?>
                            </p>
                            <span class="text-muted" style="font-size:14px !important">
                            <?php echo($row["date"]) ?>
                                <script>
                                    document.write(moment("").format('ll'))
                                </script>
                            </span>
                        </div>
                    </div>
                </article>
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