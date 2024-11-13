<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Official Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="official_login.css">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="official_login.php">Official Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="hero-section text-center">
        <h2>Welcome to the Crime Portal</h2>
        <p>Please choose your login type:</p>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Police Login</h3>
                    <p>
                        <a href="policelogin.php" class="btn btn-primary">Police Login</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Incharge Login</h3>
                    <p>
                        <a href="inchargelogin.php" class="btn btn-primary">Incharge Login</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <h3>HQ Login</h3>
                    <p>
                        <a href="headlogin.php" class="btn btn-primary">HQ Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
