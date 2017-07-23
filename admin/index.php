<!DOCTYPE html>

<html>

<head>
    <title>Login Admin</title>

    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">

    <style type="text/css">
        .row{
            padding-bottom: 15px;
            padding-top: 15px;
        }
    </style>
</head>

<body>
    <br><br><br>
    <h3 align="center">Silahkan Login</h3>
    <br><br><br><br><br><br>
    <div class="col-md-12">

        <div class="col-md-4">
            
        </div>

        <div class="col-md-4">
            <form action="../config/proses_login.php" name="admin" method="post" onSubmit="return validasi(hits)">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="username">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="password">
                </div>
                <br>
                <div align="right">
                    <button class='btn btn-danger' type="submit">Login</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            
        </div>

    </div>
    
</body>

</html> 