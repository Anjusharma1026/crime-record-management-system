<!DOCTYPE html>
<html>
<head>
<?php
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error($conn)); // Pass $conn to mysqli_error for better error reporting
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $u_id=$_POST['email'];
        $_SESSION['u_id']=$u_id;
        
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT u_id, u_pass FROM user WHERE u_id=? AND u_pass=?");
        $stmt->bind_param("ss", $name, $pass); // Bind parameters
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 0)
        {
            $message = "Id or Password not Matched.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
            header("location:complainer_page.php");
            exit(); // Always exit after header redirection
        }
    }                
}
?> 
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <style>
        body {
            background-size: cover;
            background-image: url(regi_bg.jpeg);
            background-position: center;
            font-family: 'Lato', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
            height: 100vh; /* Full viewport height */
            display: flex; /* Centering the content */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        nav {
            background-color: rgba(255, 255, 255, 0.8);
            opacity: 0.9;
            width: 100%; /* Full width */
            position: fixed; /* Stay on top */
            top: 0; /* Align to the top */
            z-index: 1000; /* Ensure navbar is above other elements */
        }

        .navbar-brand {
            color: #333 !important;
        }

        .form {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 400px; /* Fixed width for form */
        }

        .form-group label {
            font-weight: 600;
            color: #fff;
        }

        .form-control {
            border-radius: 20px;
            border: none;
            padding: 15px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            border: none;
            transition: all 0.3s;
            width: 100%; /* Full width for button */
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>

    <script>
     function f1()
        {
            var sta2=document.getElementById("exampleInputEmail1").value;
            var sta3=document.getElementById("exampleInputPassword1").value;
            var x2=sta2.indexOf(' ');
            var x3=sta3.indexOf(' ');
            if(sta2!="" && x2>=0){
                document.getElementById("exampleInputEmail1").value="";
                document.getElementById("exampleInputEmail1").focus();
                alert("Space Not Allowed");
            }
            else if(sta3!="" && x3>=0){
                document.getElementById("exampleInputPassword1").value="";
                document.getElementById("exampleInputPassword1").focus();
                alert("Space Not Allowed");
            }
        }
    </script>
    
    <title>Complainant Login</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="userlogin.php">Complainer Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="form">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1"><h1>User Id</h1></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email id" required name="email" onfocusout="f1()">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><h1>Password</h1></label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="password" onfocusout="f1()">
            </div>
            <button type="submit" class="btn btn-primary" name="s" onclick="f1()">Submit</button>
        </form>
    </div>
</body>
</html>
