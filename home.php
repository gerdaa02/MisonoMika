<?php
  session_start();

  include("config.php");
  if(!isset($_SESSION['valid'])){
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
<video autoplay muted loop id = "video-background"><source src = "Honkai.mp4" type="video/mp4"></video>
    <div class="nav">
        <div class="logo">
            <p style="color: white">Beatrice</p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }

            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>
            
            <a href="logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p style="color: white">Hello <b style="color: white"><?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div class="box">
                    <p style="color: white">Your email is <b style="color: white"><?php echo $res_Email ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p style="color: white">And you are <b style="color: white"><?php echo $res_Age ?> years old</b>.</p>
                </div>
            </div>
        </div>
    </main>
    <style>
        #video-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
        }
        .box{
    background: rgba(0,0,0,0.2);
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 20px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                0 32px 64px -48px rgba(0,0,0,0.5);
}
.right-links a{
    color: white;
}
.nav{
    background: rgba(0,0,0,0.2);
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    line-height: 60px;
}
    </style>
</body>
</html>