<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css" />
        <title>town register</title>
    </head>

    <body>
     <?php if(isset($_SESSION["error"])){
        echo "<p class='alert  alert-danger'>".$_SESSION["error"]."</p>";
         $_SESSION["error"]=NULL;
     }?>
        <div class="container">
            <div class="bs-component">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <fieldset>
                        <legend>Register</legend>
                        <div class="form-group">
                            <label for="firstName" class="col-lg-2 control-label">Първо име</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="firstName" id="firstName" placeholder="First name" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="col-lg-2 control-label">Фамилия</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="lastName" id="lastName" placeholder="Last name" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nickname" class="col-lg-2 control-label">Прякор</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="nickname" id="nickname" placeholder="Nickname" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-2 control-label">Парола</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="password" id="password" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="col-lg-2 control-label">Повтори паролата</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="confirm" id="confirm" placeholder="Confirm password" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Електронна поща</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="email" id="email" placeholder="Email" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-2 control-label">Телефонен номер</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="phone" id="phone" placeholder="Phone" type="tel">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-lg-2 control-label">Рожденна дата</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="birthday" id="birthday" placeholder="birthday" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Прекрати</button>
                                <button type="submit" name="register" class="btn btn-primary">Регистрирай се</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>

</html>