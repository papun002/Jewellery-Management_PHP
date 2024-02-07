<!-- PHP Starts Here -->
<?php
session_start();
require "../db.php";

if(isset($_SESSION['client_logid'])){
    header("location:client_dashboard.php");
    echo "<script> 
                window.location.href = 'client_dashboard.php';
        </script>";
}else{

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Jewellary Management &mdash; Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    background: #ecf0f3
}

.wrapper {
    max-width: 370px;
    min-height: 500px;
    margin: 120px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 10px #cbced1, -13px -13px 15px #fff
}

.logo {
    width: 80px;
    margin: auto
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
}

.wrapper .form-field .fas {
    color: #555
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #03A9F4;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
    letter-spacing: 1.3px
}

.wrapper .btn:hover {
    background-color: #039BE5
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #03A9F4
}

.wrapper a:hover {
    color: #039BE5
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px
    }  
}


.main-footer{
 text-align: center;position: relative;bottom: 51px;
}

@media screen and (min-width:10px) and (max-width:425px) {
 .main-footer{
 text-align: center;position: relative;bottom: 10px;
 
 }
 .footer-left{
  margin: 0px 10px;
 }
}
    </style>
  </head>
  <body>
    
<!-- login start here -->
<div>
<div class="wrapper">
    <div class="logo"> <img src="https://blog.hubspot.com/hubfs/image8-2.jpg" alt=""> </div>
    <div class="text-center mt-4 name">Jewellary Management</div>
    <form class="p-3 mt-3" method="post">
        <div class="form-field d-flex align-items-center"> <span class="fa fa-user"></span> 
            <input type="text" name="userName" id="userName" placeholder="Username" required autofocus> 
            
        </div>
        <div class="form-field d-flex align-items-center"> <span class="fa fa-key"></span> 
            <input type="password" name="password" id="pwd" placeholder="Password" required > 
            
        </div> 
        <button class="btn mt-3" name="login">Login</button>
    </form>
    <div class="text-center fs-6"> <a href="#">Forget password?</a> or <a href="#">Sign up</a> </div>
    <?php
    
    
    if(isset($_POST['login'])){
        $client_userName = $_POST['userName'];
        $password = $_POST['password'];
        $client_password = md5($password);
    
        $sql = "SELECT * FROM client_jms WHERE `client_user`='$client_userName'; ";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $sql1 = "SELECT `client_password` FROM client_jms WHERE `client_password`='$client_password'; ";
            $result1 = mysqli_query($con,$sql1);
            if(mysqli_fetch_array($result1)>0){
                $_SESSION['client_name'] = $row['client_name'];
                $_SESSION['client_logid'] = $row['client_id'];
                $_SESSION['client_username'] = $row['client_user'];
                $_SESSION['contact_person'] = $row['contact_person'];
                
                // next page script 
                header("location:client_dashboard.php");
                echo "<script> 
                        window.location.href = 'client_dashboard.php';
                    </script>";    
                    exit();
                // next page script 

            }else{  
                echo '<div class="alert alert-danger alert-dismissible fade show align-items-center" role="alert" style="margin-top: 15px;">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div>
                      Wrong Password!!
                    </div>
                  </div>';
            }
        }else{
            // $sql2 = "SELECT * FROM staff_master WHERE `user_name`='$userName'; ";
            // $result2 = mysqli_query($con,$sql2);
            // if(mysqli_num_rows($result2)>0){
            //     $row2=mysqli_fetch_assoc($result2);
            //     $sql3 = "SELECT `user_pass` FROM staff_master WHERE `user_pass`='$password'; ";
            //     $result3 = mysqli_query($con,$sql3);
            //     if(mysqli_fetch_assoc($result3)>0){
            //         $_SESSION['staff_name'] = $row2['name'];
            //         $_SESSION['staff_logid'] = $row2['login_id'];
            //         echo "<script> 
            //                 window.location.href = 'staff/index.php';
            //             </script>";
            //     }else{  
            //         echo '<div class="alert alert-danger alert-dismissible fade show align-items-center" role="alert" ">
            //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //             <div>
            //             Wrong Password!!
            //             </div>
            //         </div>';
            //     }
            // }else{
                echo '<div class="alert alert-danger alert-dismissible fade show align-items-center" role="alert" style="margin-top: 15px;">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div>
                      Account doesnot exits!!
                    </div>
                  </div>';
            }
        }
    ?> 
</div>
</div>
<!-- Start app Footer part -->
<footer class="main-footer">
 <div class="footer-left">
     <div class="bullet"></div>Copyright &copy; 2022 <a href="" style="text-decoration: none;"> Jewellary Management</a>.
 </div>
 
</footer>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
}
?>