<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body{
            background-color:#d1e6f0;
        }
        .form-container{
            background-color:white;
            text-align:center;
            display:block;
            margin:auto;
            margin-top:200px;
            width:600px;
            height:200px;
            border:5px solid;
            border-radius:15px;
        }
        h1{
            font-size:50px;
        }
        form{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        input[type="email"]{
            height:30px;
            width:500px;
            text-align:center;
            border-radius:7px;
        }
        input[type="submit"]{
            background-color:#89cff0;
            height:35px;
            width:70px;
            border-radius:7px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Subscription Form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="email" name="mail" id="mail" placeholder="Enter your email">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
    //database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "web";
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        die("Connection is not established".mysqli_connect_error());
    }else{
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['mail'])){
                $mail = $_POST['mail'];
                $un = "SELECT * FROM `user_data` WHERE `user_mail` = '$mail'";
                $result1 = mysqli_query($conn,$un);
                $noofrows = mysqli_num_rows($result1);
                if($noofrows> 0){
                    echo "<script>alert('User Mail is already taken')</script>";
                }else{
                    $sql = "INSERT INTO `user_data` (`id`, `user_mail`) VALUES (NULL, '$mail')";
                    $result2 = mysqli_query($conn,$sql);
                    echo "<script>alert('form submitted successfully')</script>";
                }
            }
        }
    }
?>