<?php
if (count($subscriptions) == 0) {
    array_unshift($subscriptions, array("date" => ""));
}
if ($currentUser["picture"] == "") {
    $currentUser["picture"] = "http://www.free-icons-download.net/images/house-icon-80778.png";
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Welcome to your profile</title>
        <script src="./javascript/edit.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    </head>

    <body>
        <div style="margin-bottom: 0" class="panel panel-default">
            <div class=""> <h4> Business Profile </h4></div >
            <div class="panel-body">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="col-sm-6">
                            <div align="center"> <img alt="User Pic" style="height: 100px" src="<?= $currentUser["picture"] ?>" id="profile-image1" class="img-rounded img-responsive">

<!--                                <input id="profile-image-upload" class="hidden" type="file">
                                <div style="color:#999;">click here to change profile image</div>-->
                                <!--Upload Image Js And Css-->
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
        <div class="container">
            <br />
            <h2 align="center">запази час</h2>
            <br />
            <div class="col-md-4" style="margin-left:100px;">
                <form>
                    за дате:<input type="hidden" name="name" value="<?= $_GET["name"] ?>">
                    <input type="date" name="date" class="form-control" value=<?php
                    if (isset($_GET["date"])) {
                        echo $_GET["date"];
                    } else {
                        $d = new DateTime('now');
                        echo $d->format("Y-m-d");
                    }
                    ?>>
                    <br/>
                    <input type="submit" class="btn btn-primary" value="Отиди на съответната дата">
                </form>
            </div>
            <br /><br />
            <br /><br />         <br /><br />         <br /><br />         <br /><br />

        </div>
<!--        <script>
            $(document).ready(function () {
                $('.selectpicker').selectpicker();

                $('#service').change(function () {
                    $('#hidden_service').val($('#service').val());
                });

                $('#multiple_select_form').on('submit', function (event) {
                    event.preventDefault();
                    if ($('#service').val() != '')
                    {
                        var form_data = $(this).serialize();
                        $.ajax({
                            url: "subscribe.php",
                            method: "POST",
                            data: form_data,
                            success: function (data)
                            {
                                //console.log(data);
                                $('#hidden_service').val('');
                                $('.selectpicker').selectpicker('val', '');
                                alert(data);
                            }
                        })
                    } else
                    {
                        alert("Please select service");
                        return false;
                    }
                });
            });
        </script>--><div class="col-md-6">
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>Час</th>
                        <th>Свободен/Запазен</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $start_working = new DateTime($currentUser["start_working"]);
                    $i = 0;
                    $x = 0;
                    $count = count($subscriptions);


                    while ($start_working < new DateTime($currentUser["start_lunch"]) && $i != 30):
                        ?>
                        <?php
                        if ($count == $x) {
                            $x--;
                        }
                        if (date_format($start_working, 'H:i') != substr($subscriptions[$x]["date"], 11, 5)):
                            ?>
                            <tr>
                                <th><?= date_format($start_working, 'H:i') ?></th>
                                <th><span><img src="./images/ок.png">Свободен</span></th>
                            </tr>
                        <?php else: $x++; ?>    
                            <tr>
                                <th><?= date_format($start_working, 'H:i') ?></th>
                                <th><span><img src="./images/bad.png">Запазен</span></th>
                            </tr>
                        <?php endif; ?>
                        <?php
                        $i++;
                        date_add($start_working, date_interval_create_from_date_string($currentUser["time_for_service"] . ' mins'));
                    endwhile;
                    ?>
                    <?php
                    $start_working = new DateTime($currentUser["stop_lunch"]);
                    $i = 0;
                    while ($start_working < new DateTime($currentUser["stop_working"]) && $i != 30):
                        ?>

                        <?php
                        if ($count == $x) {
                            $x--;
                        }
                        if (date_format($start_working, 'H:i') != substr($subscriptions[$x]["date"], 11, 5)):
                            ?>
                            <tr>
                                <th><?= date_format($start_working, 'H:i') ?></th>
                                <th><span><img src="./images/ок.png">Свободен</span></th>
                            </tr>
                        <?php else: $x++; ?>    
                            <tr>
                                <th><?= date_format($start_working, 'H:i') ?></th>
                                <th><span><img src="./images/bad.png">Запазен</span></th>
                            </tr>
                        <?php endif; ?>
                        <?php
                        $i++;
                        date_add($start_working, date_interval_create_from_date_string($currentUser["time_for_service"] . ' mins'));
                    endwhile;
                    ?>                

                </tbody>
            </table>
        </div>
        <br/><br/>
    </div>
    <div  class="col-md-4" style="margin-left:200px;">
        <form method="post" action="./subscribe.php" id="multiple_select_form">
            <input type="hidden" name="date" value="<?php
            if (isset($_GET["date"])) {
                echo $_GET["date"];
            } else {
                $d = new DateTime('now');
                echo $d->format("Y-m-d");
            }
            ?>">
            <label for="time"><?php
                if (isset($_GET["date"])) {
                    $d = new DateTime($_GET["date"]);
                    echo $d->format("l") . " " . $_GET["date"];
                } else {
                    $d = new DateTime('now');
                    echo $d->format("l") . " " . $d->format("Y-m-d");
                }
                ?></label>
            <select name="time" id="time" class="form-control selectpicker">
                <?php
                $start_working = new DateTime($currentUser["start_working"]);
                $i = 0;
                $x = 0;
                $count = count($subscriptions);
                while ($start_working < new DateTime($currentUser["start_lunch"]) && $i != 30):
                    ?>
                    <?php if (date_format($start_working, 'H:i') != substr($subscriptions[$x]["date"], 11, 5)): ?>
                        <option> <?= date_format($start_working, 'H:i'); ?></option>
                        <?php
                    else:($x++);
                    endif;
                    ?>
                    <?php
                    $i++;
                    date_add($start_working, date_interval_create_from_date_string($currentUser["time_for_service"] . ' mins'));
                endwhile;
                ?>
                <?php
                $start_working = new DateTime($currentUser["stop_lunch"]);
                $i = 0;
                while ($start_working < new DateTime($currentUser["stop_working"]) && $i != 30):
                    ?>
                    <option> <?= date_format($start_working, 'H:i'); ?></option>
                    <?php
                    $i++;
                    date_add($start_working, date_interval_create_from_date_string($currentUser["time_for_service"] . ' mins'));
                endwhile;
                ?>
            </select>
            <br /><br />
            <!--<input type="hidden" name="hidden_service" id="hidden_service" />-->
            <input type="submit" name="submit" class="btn " value="запази час" />
        </form>
        <br />

    </div>


</body>
</html>