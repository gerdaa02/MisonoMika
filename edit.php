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
    <title>Change Profile</title>
<body>
<video autoplay muted loop id = "video-background"><source src = "1st pv.mp4" type="video/mp4"></video>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Beatrice</a> </p>
        </div>

        <div class="right-links">
           
            <a href="logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id ") or die("error occured");

                if($edit_query){
                    echo "<div class='message'>
                          <p>Profile Updated!</p>
                           </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Go Home</button>";

                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];

                }

            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname ?>" autocomplete="off" placeholder="Username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email ?>" autocomplete="off" placeholder="Email" required>
                </div>
                
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age ?>" autocomplete="off" placeholder="Age" required>
                </div>

                <div class="field">
    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
            
            </form>
        </div>
        <?php } ?>
    </div>
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