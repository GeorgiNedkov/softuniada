<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css" />
        <title>town register</title>
    </head>

    <body>
     <?php if(isset($_SESSION["error"])){
         echo $_SESSION["error"];
         $_SESSION["error"]=NULL;
     }?>
        <div class="container">
            <div class="bs-component">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <fieldset>
                        <legend>Register</legend>
                        <div class="form-group">
                            <label for="nickname" class="col-lg-2 control-label">Име</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="nickname" id="nickname" placeholder="Name" type="text">
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
                            <label for="location" class="col-lg-2 control-label">Локация</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="location" id="nickname" placeholder="location" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profession" class="col-lg-2 control-label">Професия</label>
                            <div class="col-lg-10">
                                <select name="profession" class="form-control" id="profession">
                                    <?php foreach ($professions as $profession): ?>
                                        <option value="<?= $profession["id"]; ?>">
                                            <?= $profession["name"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-lg-2 control-label">Описание</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                                <span class="help-block">Опиши твоя бизнес за по добро потребителско отзвук</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="TimeService">Време за изпълняване на услугата(в минути)</label>
                            <input type="number" class="form-control" id="TimeService" name="TimeService" placeholder="15" aria-describedby="TimeService">
                        </div>


                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" name="register" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>

</html>