<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn, "crime_portal");
    
    $i_id=$_SESSION['email'];
    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$i_id'");
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];
    
    if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $cid=$_POST['cid'];
            
            $_SESSION['cid']=$cid;
            $qu=mysqli_query($conn,"select inc_status,location from complaint where c_id='$cid'");
            
            $q=mysqli_fetch_assoc($qu);
            $inc_st=$q['inc_status'];
            $loc=$q['location'];
            
            if(strcmp("$loc","$location")!=0)
            {
                $msg="Case Not of your Location";
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }
            else if(strcmp("$inc_st","Unassigned")==0)
            {   
                header("location:Incharge_complain_details.php");
            }
            else
            {
                header("location:incharge_complain_details1.php");
            }
        }
    }
    
    $query="select c_id,type_crime,d_o_c,location,inc_status,p_id from complaint where location='$location' order by c_id desc";
    $result=mysqli_query($conn,$query);  
    ?>

	<title>Incharge Homepage</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
    <script>
     function f1()
        {
          var sta2=document.getElementById("ciid").value;
          var x2=sta2.indexOf(' ');
          if(sta2!="" && x2>=0)
          {
              document.getElementById("ciid").value="";
              alert("Blank Field not Allowed");
          }       
        }
    </script>
    
</head>
<body style="background-color: #dfdfdf">
	<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="official_login.php">Official Login</a></li>
                    <li><a href="inchargelogin.php">Incharge Login</a></li>
                    <li class="active"><a href="Incharge_complain_page.php">Incharge Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 70px;">
        <h1 align="center"><b>Complaints Assigned to You</b></h1>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form method="post">
                    <div class="form-group">
                        <label for="cid">Complaint ID</label>
                        <input type="text" name="cid" id="ciid" class="form-control" placeholder="Enter Complaint ID" required onfocusout="f1()">
                    </div>
                    <button type="submit" class="btn btn-primary" name="s2">Search</button>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Type of Crime</th>
                    <th>Date of Complaint</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>{$row['c_id']}</td>";
                    echo "<td>{$row['type_crime']}</td>";
                    echo "<td>{$row['d_o_c']}</td>";
                    echo "<td>{$row['location']}</td>";
                    echo "<td>{$row['inc_status']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
