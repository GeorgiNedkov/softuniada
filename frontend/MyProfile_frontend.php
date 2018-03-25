<?php
if ($currentUser["picture"] == "") {
    $currentUser["picture"] = "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="bootstrap.css" />
        <title>Welcome to your profile</title>
        <!--<script src="./javascript/edit.js"></script>-->

        <style>
            a:hover{
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <?php if ($_SESSION["type"] == "user") : ?>

            <div class="panel panel-default">
                <div class="">
                    <h4><?= $currentUser["type"] ?> Profile</h4>
                </div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body">
                            <div class="col-sm-6">
                                <div align="center">
                                    <img alt="User Pic" style="width: 100px" src="<?= $currentUser["picture"] ?>"
                                         id="profile-image1" class="img-circle img-responsive">

                                </div>
                                <br>
                                <!-- /input-group -->
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    <h4 style="color:#ac3911;">
                                        <?= $currentUser["first_name"] . " " . $currentUser["last_name"] ?>
                                    </h4>
                                    <span>    
                                        <p>
                                            <?= $currentUser["type"] ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="clearfix"></div>          
                                <hr style = "margin: 5px 0 5px 0;">

                                <div  class="col-sm-5 col-xs-6 tital">Първо име:</div>
                                <div id="firstname"> 
                                    <div id="firstnameInfo" class="col-sm-7 col-xs-6"><?= $currentUser["first_name"] ?></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div  class="col-sm-5 col-xs-6 tital" >Фамилия :</div>
                                <div id="lastname">
                                    <div  class="col-sm-7"><?= $currentUser["last_name"] ?></div>   
                                </div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 ti t al ">Дата на раждане:</div>
                                <div id="birthday">
                                    <div  class="col-sm-7"><?= date("j-F-Y", strtotime($currentUser["born_on"])) ?></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col- x s-6 tital ">Телефонен номер:</div>
                                <div id="phone">
                                    <div  class="col-sm-7"><?= $currentUser["phone"] ?></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                            </div>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div >


                </div> 
            </div>
            списък с предстоящи часове
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>кога</th>
                        <th>къде</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subscriptions as $s): ?>
                        <tr>
                            <th><?= $s["date"] ?></th>
                            <th><a style="color: black" href="<?= "./Profile.php?name=" . $s["bisness_name"] ?>"><?= $s["bisness_name"] ?></a></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <?php
        if ($currentUser["picture"] == "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg") {
            $currentUser["picture"] = "http://www.free-icons-download.net/images/house-icon-80778.png";
        }
        ?>
        <?php if ($_SESSION["type"] == "bisness") : ?>
            <div style="margin-bottom: 0" class="panel panel-default">
                <div class="panel-heading"> <h4> Business Profile </h4></div >
                <div class="panel-body">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="col-sm-6">
                                <div align="center"> <img alt="User Pic" style="height: 100px" src="<?= $currentUser["picture"] ?>" id="profile-image1" class="img-rounded img-responsive">

                                </div>
                                <br>
                                <!-- /input-group -->
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    <h4 style="color:#00b1b1;"><?= $currentUser["name"] ?></h4>
                                    <span><p><?= $currentUser["profession"] ?></p></span>
                                </div>

                                <div class="clearfix"></div>
                                <hr style="margin:5px 0 5px 0;">
                                <div class="col-sm-5 col-xs-6 tital ">Име:</div>
                                <div class="col-sm-7 col-xs-6 "><?= $currentUser["name"] ?></div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                                <div class="col-sm-5 col-xs-6 tital ">Телефонен номер:</div>
                                <div class="col-sm-7"><?= $currentUser["phone"] ?></div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 2px 0 2px 0" class="panel panel-default"><?= $currentUser["description"] ?></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Час</th>
                        <th>Запазено от</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subscriptions as $subscription): ?>
                    <tr>
                        <th><?= $subscription["date"] ?></th>
                        <th><?= $subscription["name"]." " . $subscription["name2"] ?></th>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</body>
</html>