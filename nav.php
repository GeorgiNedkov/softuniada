<meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link href="https://cdn3.iconfinder.com/data/icons/classic-icons-1/512/13.png" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="bootstrap.css" />
<title>Spesti Vreme и нерви с моя уеб проект</title>

<style>
    ul.mynav {
        /*position:fixed;*/
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #e95420;
    }

    ul.mynav li {
        float: left;
        border-right:1px solid #bbb;
    }

    il.mynav li:last-child {
        border-right: none;
    }

    ul.mynav li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    ul.mynav li a:hover:not(.active) {
        background-color: white;
    }

    .active {
        background-color: #4CAF50;
    }
    .last{
        border-right: none
    }

    div.opp{
        display: none;
        position: absolute;
        width: 150px;
        top: 10px;
        right:30px
    }
    div.opp ul{
        display: inline;
    }
    div.opp ul li{
        text-align: center;
        border: solid 1px black;
        z-index: 2;
    }
    div.opp ul li a{
        /*text-align: center;*/
        color:black;
    }
    div.changeImg{


        background-color: #c6c5c2;
        position: fixed;
        top:50%;
        left:30%;
        display: none;
    }
    div.changeImg form input{
        margin-right: 20%;
    }
    div.mynav li a:hover{
        color: #e95420;
    }
    div.opp ul li a:hover{
        /*text-align: center;*/
        text-decoration: none;
    }


</style>
<div class="mynav">
    <ul class="mynav">
        <li><a class="navbar-brand" href="./">Начална страница</a></li>
        <?php if (isset($_SESSION["user_id"])) : ?> 
            <li><a href="MyProfile.php">Твоя профил</a></li>
        <?php endif; ?>
        <li><a href="Search.php">Търсене</a></li>
        <?php if (!isset($_SESSION["user_id"])) : ?> 
            <li><a href="login.php">Влез в акаунта си</a></li>
            <li><a href="registeruser.php">Регистрирай нов потребител</a></li>
            <li><a href="register.php">Регистрирай нов бизнес профил</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION["user_id"])) : ?> 
            <li style="float:right; padding-top: 10px; padding-right: 5px;"><div><img onclick="loadOptions()"style="cursor:pointer;" width="75%" src="images/option.png"></div></li>
        <?php endif; ?>
    </ul>
</div>
<?php if (isset($_SESSION["user_id"])) : ?> 
    <div class="opp" id="opp">
        <ul class="opp list-group">
            <li class="list-group-item"><a href="./EditProfileInfo.php">Редактирай информацията на профила си</a></li>
            <li class="list-group-item"><p onclick="changeImage()" style="cursor:pointer;">Смени снимката си</p></li>
            <li class="list-group-item"><a href="./ChangePassword.php">Смяна на паролата</a></li>
            <li class="list-group-item"><a href="./logout.php">Излизане от акаунта</a></li>
        </ul>
    </div>

    <div id="changeImg" class="changeImg form-group">
        <form method="POST" action="./Update.php" enctype="multipart/form-data">
            <label for="image">Избери снимка</label>
            <input class="btn btn-file" id="image" name="avatar" type="file">
            <input type="submit" class="btn btn-submit" value="change">
        </form>
    </div>
<?php endif; ?>


<script>
    window.onload = document.getElementById("changeImg").style.display = "none";

    function changeImage() {

        var ell = document.getElementById("changeImg");
        if (ell.style.display === "none") {
            ell.style.display = "inline";
        } else {
            ell.style.display = "none";
        }

    }


</script>

<script>
    window.onload = document.getElementById("opp").style.display = "none";

    function loadOptions() {
        var ell = document.getElementById("opp");
        if (ell.style.display === "none") {
            ell.style.display = "inline";
        } else {
            ell.style.display = "none";
        }
    }


</script>