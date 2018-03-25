<?php
if ($_SESSION["type"] == "bisness") {
    $startw = substr($currentUser["start_working"], 11, 5);
    $startl = substr($currentUser["start_lunch"], 11, 5);
    $stopl = substr($currentUser["stop_lunch"], 11, 5);
    $stopw = substr($currentUser["stop_working"], 11, 5);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
<?php if ($_SESSION["type"] == "user"): ?>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">

                <form method="post" action="./Update.php">
                    <div class="form-group">
                        <label for="FirstName">Първо име</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" aria-describedby="FirstName" value=<?= $currentUser["first_name"] ?>>
                    </div>        
                    <div class="form-group">
                        <label for="LastName">Фамилия</label>
                        <input type="text" class="form-control" id="LastName" name="LastName" aria-describedby="LastName" value=<?= $currentUser["last_name"] ?>>
                    </div>
                    <div class="form-group">
                        <label for="BornOn">Роден на дата</label>
                        <input type="date" class="form-control" id="BornOn" name="BornOn" aria-describedby="BornOn" value=<?= $currentUser["born_on"] ?>>
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефонен номер</label>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" value=<?= $currentUser["phone"] ?>>
                    </div>




                    <button type="submit" class="btn btn-primary">запази</button>
                </form>

            </div>
            <div class="col-lg-1"></div>


<?php endif; ?>






<?php if ($_SESSION["type"] == "bisness"): ?>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">

                <form method="post" action="./update.php">
                    <div class="form-group">
                        <label for="phone">Телефонен номер</label>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" value=<?= $currentUser["phone"] ?>>
                    </div>

                    <div class="form-group">
                        <label for="StartWork">Час на започване на работа</label>
                        <input type="text" class="form-control" id="StartWork" name="StartWork" placeholder="00:00" aria-describedby="phone" value=<?= $startw ?>>
                    </div>

                    <div class="form-group">
                        <label for="StartLunch">Начало на обедна почивка</label>
                        <input type="text" class="form-control" id="StartLunch" name="StartLunch" placeholder="00:00" aria-describedby="StartLunch" value=<?= $startl ?>>
                    </div>



                    <div class="form-group">
                        <label for="StopLunch">Край на обедна почивка</label>
                        <input type="text" class="form-control" id="StopLunch" name="StopLunch" placeholder="00:00" aria-describedby="StopLunch" value=<?= $stopl ?>>
                    </div>

                    <div class="form-group">
                        <label for="StopWork">Край на работния ден</label>
                        <input type="text" class="form-control" id="StopWork" name="StopWork" placeholder="00:00" aria-describedby="StopWork" value=<?= $stopw ?>>
                    </div>



                    <button type="submit" class="btn btn-primary">запази</button>
                </form>

            </div>
            <div class="col-lg-1"></div>


<?php endif; ?>
    </body>

</html>