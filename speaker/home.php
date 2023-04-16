<?php
session_start();
// if(isset($_SESSION["donarid"])){

// }else{
//     header("Location:/donar?err=Something Went Wrong!");
//     die();
// }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speakers</title>
    <script src="/static/js/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background:white;box-shadow:1px 1px 2px #aaa;">
        <div class="container">
            <a class="navbar-brand" style="font-size:22px;font-weight:900;color:#2b74e2" href="">
                <img src="/static/img/logo.png" height="50px" width="auto" alt="">
            </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
                        <a class="nav-link active" style="color:#3b486f;font-weight:700" aria-current="page" href="/speaker/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color:#3b486f;" aria-current="page" href="/speaker/activities.php">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color:#3b486f;" aria-current="page" href="/speaker/apply.php">Apply</a>
                    </li>
					<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/speaker?msg=Logged out Successfully">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-3 mb-3">
        <p style="background-color:rgba(159,163,179,1);padding:10px;border-radius:8px;color:#444;border:1px solid #ccc;font-size:18px">Welcome <span style="font-size:20px;color:white"><?php echo($_SESSION["speakername"])?></span> ,</p>

        <?php require("./layout/db.php");?>
        <div class="row">
            <?php
            $sql = "SELECT * FROM event order by id DESC";
            $result = $conn->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {
                ?>
                <h3 class="mb-3" style="color:#3b486f">Events :</h3>
                <?php
                while($row=$result->fetch_assoc()){
            ?>
                <article class="col-sm-12 col-md-6 col-lg-4 mb-1" >
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
    </main>
    <script>
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      if(urlParams.get('err')){
        document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
      }
      setTimeout(()=>{
          document.getElementById("err").style.display="none"
      }, 3000)
      if(urlParams.get('msg')){
        document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
      }
      setTimeout(()=>{
          document.getElementById("msg").style.display="none"
      }, 3000)
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>