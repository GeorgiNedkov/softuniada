<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css"  href="bootstrap.css"/>
        <title>town</title>
    </head>
    <body>
        <div class="container">
     <?php if(isset($_SESSION["error"])){
         echo "<p class='alert  alert-danger'>".$_SESSION["error"]."</p>";
         $_SESSION["error"]=NULL;
     }?>

            <div class = "bs-component">
                <form method = "POST" action = "./test.php" class = "form-horizontal">
                    <fieldset>
                        <legend>Login</legend>
                        <div class = "form-group">
                            <label for = "nickname" class = "col-lg-2 control-label">Прякор</label>
                            <div class = "col-lg-10">
                                <input class = "form-control" name = "nickname" id = "nickname" placeholder = "Nickname" type = "text">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "password" class = "col-lg-2 control-label">Парола</label>
                            <div class = "col-lg-10">
                                <input class = "form-control" name = "password" id = "password" placeholder = "Password" type = "password">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label class = "col-lg-2 control-label">Влез като</label>
                            <div class = "col-lg-10">
                                <div class = "radio">
                                    <label>
                                        <input name = "type" id = "user" value = "user" type = "radio" checked = "checked">
                                        <span>Потребител</span>
                                    </label>
                                    <label>
                                        <input name = "type" id = "business" value = "business" type = "radio">
                                        <span>Бизнес лице</span>
                                    </label>

                                </div>
                            </div>

                        </div>
                        </div>
                        <div class = "form-group">
                            <div class = "col-lg-10 col-lg-offset-2">
                                <button type = "reset" class = "btn btn-default">Прекрати</button>
                                <button type = "submit" name = "login" class = "btn btn-primary">Влез</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>