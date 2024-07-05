<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers</title>
    <style>
        body{
            background-color:#d1e6f0;
        }
        .user_list{
            background-color:white;
            text-align:center;
            display:block;
            margin:auto;
            margin-top:100px;
            width:600px;
            height:600px;
            box-sizing:border-box;
            border-radius:15px;
        }
        h1{
            margin-top:50px;
            font-size:50px;
        }
        .mail{
            height:500px;
            width:500px;
            display:block;
            /* border:2px solid; */
            margin:auto;
        }
        .mails{
            margin:5px;
            padding:10px;
            border:3px solid;
            border-radius:8px;
        }
    </style>
</head>
<body>
    <div class="user_list">
        <h1>Subscribers List</h1>
        <div class="mail">
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
                    $sql="SELECT * FROM `user_data` WHERE 1";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="mails">'.$row['user_mail'].'</div>';
                    }
                }
            ?>
        </div>
    </div>

</body>
</html>