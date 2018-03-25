<?php ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    </head>
    <body>
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

            <form method="post" action="./Update.php" class="form-horizontal">
                <legend>Chnage Password</legend>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <label for="OldPassword" class="col-lg-2 control-label">Old Password</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="OldPassword" id="OldPassword" placeholder="Old Password" type="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="NewPassword" class="col-lg-2 control-label">New Password</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="NewPassword" id="NewPassword" placeholder="New Password" type="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="col-lg-2 control-label">Confirm password</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="confirm" id="confirm" placeholder="Confirm password" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" name="register" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-1"></div>
    </body>
</html>
