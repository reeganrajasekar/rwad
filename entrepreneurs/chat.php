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
    <title>Entrepreneurs</title>
    <script src="/static/js/moment.js"></script>
    <link rel="stylesheet" href="/static/css/chat.css">
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
                        <a class="nav-link" style="color:#3b486f;" aria-current="page" href="/entrepreneurs/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color:#3b486f;" aria-current="page" href="/entrepreneurs/activities.php">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color:#3b486f;" aria-current="page" href="/entrepreneurs/store.php">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color:#3b486f;font-weight:700" aria-current="page" href="/entrepreneurs/chat.php">Chat</a>
                    </li>
					<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/entrepreneurs?msg=Logged out Successfully">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-3 mb-3">
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> Rwad Chat
            </div>
            <div class="msger-header-options">
            <span></span>
            </div>
        </header>

        <main class="msger-chat" id="chat">
            <?php
            $enid=$_SESSION["enid"];
            $sql = "SELECT * FROM chat WHERE enid='$enid' order by id ASC";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <?php
            if($row["mid"]=="no"){
            ?>
            <div class="msg right-msg">
                <div class="msg-img" style="display:flex;justify-content:center;align-items:center;font-size:22px;color:white">En</div>
                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name"><?php echo $row["name"] ?></div>
                        <div class="msg-info-time"><?php echo $row["date"] ?></div>
                    </div>
                    <div class="msg-text">
                    <?php echo $row["data"] ?>
                    </div>
                </div>
            </div>
            
            <?php
            }else{
            ?>
            <div class="msg left-msg">
                <div class="msg-img" style="display:flex;justify-content:center;align-items:center;font-size:22px;color:white">Mem</div>
                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name"><?php echo $row["name"] ?></div>
                        <div class="msg-info-time"><?php echo $row["date"] ?></div>
                    </div>
                    <div class="msg-text">
                    <?php echo $row["data"] ?>
                    </div>
                </div>
            </div>
            <?php
            }
            }
            ?>
        </main>

        <script>document.getElementById('chat').lastElementChild.scrollIntoView({ behavior: 'smooth' });;</script>

        <form class="msger-inputarea" action="/entrepreneurs/action/chat.php" method="post">
            <input type="text" name="data" class="msger-input" placeholder="Enter your message...">
            <button type="submit" class="msger-send-btn">Send</button>
        </form>
    </section>
        
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