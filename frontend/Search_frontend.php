<?php $count = 0;
?>
<?php $prof = "Profession" ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css" />

        <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title></title>
    </head>

    <body>
        <input style="margin: 10px 0 10px 0;" class="form-control" id="myInput" type="text" placeholder="Search..">

        <select style="margin: 10px 0 10px 0" id="myselect" class="form-control"  data-style="btn-info">
            <option disabled selected value> -- Search by profession -- </option>
            <?php foreach ($professions as $profession): ?>
                <option><?= $profession["name"] ?></option>

            <?php endforeach; ?>
        </select>

        <div class="Mylist" class="row">
<!--<img alt="User Pic" style="width: 100px" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">-->
            <?php foreach ($businesses++as $bisnes): ?>
                <?php
                if ($bisnes["picture"] == "") {
                    $bisnes["picture"] = "http://www.free-icons-download.net/images/house-icon-80778.png";
                }
                ?>
                <div id="mylistItem" class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a id="mylink" style="color:white;" href="Profile.php?name=<?= $bisnes["name"] ?>" ><?= $bisnes["name"]; ?></a>
                        </div>
                        <img alt="User Pic" style="height: 100px" src="<?= $bisnes["picture"] ?>" id="profile-image1" class="img-rounded img-responsive">
                        <div class="panel-footer"><?= $professions[$bisnes["profession"] - 1]["name"]; ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <script src="./javascript/search.js"></script>

    </body>
</html>
