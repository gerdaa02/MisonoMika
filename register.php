<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<video autoplay muted loop id = "video-background"><source src = "girl.mp4" type="video/mp4"></video>
    <div class="container">
        <div class="box form-box">

        <?php 

        include("config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            //verifying the unique email

            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) !=0 ){
                echo "<div class='message'>
                          <p>This email is used, Try another One Please!</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{

                mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occured");
                
                echo "<div class='message'>
                          <p>Registration succesfully!</p>
                      </div> <br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button>";
            }

            }else{

            ?>
            <header style="color: white">Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username" style="color: white">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" placeholder="Username" required>
                </div>

                <div class="field input">
                    <label for="email" style="color: white">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" required>
                </div>
                
                <div class="field input">
                    <label for="age" style="color: white">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" placeholder="Age" required>
                </div>

                <div class="field input">
                    <label for="password" style="color: white">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required>
                </div>
    
                <div class="field">
    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php" style="color: white">Sign In</a>
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
.links{
    margin-bottom: 15px;
    color: white;
}
    </style>
</body>
</html>