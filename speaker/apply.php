<?php
session_start();
// if(isset($_SESSION["donarid"])){

// }else{
//     header("Location:/donar?err=Something Went Wrong!");
//     die();
// }
?> 
<?php require("./layout/db.php");?>

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
                        <a class="nav-link active" style="color:#3b486f;" aria-current="page" href="/speaker/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color:#3b486f;" aria-current="page" href="/speaker/activities.php">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color:#3b486f;font-weight:700" aria-current="page" href="/speaker/apply.php">Apply</a>
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
        <div class="container">
            <div style="display:flex;justify-content:space-between">
                <h3 class="mb-3" style="color:#3b486f">Your Application :</h3>
                <button class="btn btn-primary" style="background-color: #012970;" data-bs-toggle="modal" data-bs-target="#myModal">Request</button>
            </div>
        </div>
        <br>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:#012970">Request :</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form onsubmit="document.getElementById('loader').style.display='block'" enctype="multipart/form-data" action="/speaker/action/request.php" method="post">
                        <div class="form-floating mb-3 ">
                            <label for="yourUsername" class="form-label">Speech Type</label>
                            <div class="input-group has-validation">
                                <select name="cat" required class="form-select">
                                    <option selected disabled value="">Select Speech category</option>
                                    <option value="General">General</option>
                                    <option value="Technical">Technical</option>
                                    <option value="Business">Business</option>
                                    <option value="Others">Others</option>
                                </select>
                                <div class="invalid-feedback">Please Select Type.</div>
                            </div>
                        </div>
                        <div class="form-floating mb-3 ">
                            <input required type="text" class="form-control"  name="title" placeholder="Hospital Name">
                            <label>Title</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <textarea cols="5" rows="5" required type="text" class="form-control"  name="data" placeholder="Mobile"></textarea>
                            <label>Description</label>
                        </div>
                        <div style="display:flex;justify-content:flex-end">
                            <button class="btn  w-25" style="background-color:#012970;color:#fff">Add</button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
        <?php
            $sid = $_SESSION["speakerid"];
            $result = $conn->query("SELECT * FROM speech where sid='$sid' ORDER BY id DESC");
            if($result->num_rows > 0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    $i++;
                    ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo($row["id"])?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo($row["id"])?>" aria-expanded="false" aria-controls="collapse<?php echo($row["id"])?>">
                            <?php echo($i) ?> . <?php echo($row["title"])?>
                            </button>
                            </h2>
                            <div id="collapse<?php echo($row["id"])?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo($row["id"])?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-muted">Title : <span style="color:black"><?php echo $row["title"] ?></span></p>
                                <p class="text-muted">Category : <span style="color:black"><?php echo $row["cat"] ?></span></p>
                                <p class="text-muted">Description : <span style="color:black"><?php echo $row["data"] ?></span></p>
                                <p class="text-muted">Status : <span style="color:black"><?php echo $row["status"] ?></span></p>
                                <p class="text-muted">Comment : <span style="color:black"><?php echo $row["comment"] ?></span></p>
                            </div>
                            </div>
                        </div>
                    <?php
                }
            }else{
        ?>
            <p style="text-align:center" >Nothing Found</td>
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