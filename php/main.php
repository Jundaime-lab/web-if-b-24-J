<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
        <input type="text" name="username"/>
        <input type="email" name="email"/>
        <input type="checkbox" name="hobbies[]" value="Olahraga"/>Olahraga
        <input type="checkbox" name="hobbies[]" value="Bermusik"/>Bermusik
        <input type="checkbox" name="hobbies[]" value="Traveling"/>Traveling
        <input type="submit" name="submit" value="SUBMIT"/>
    </form>
</body>
</html>

<?php
// http://localhost:8000/IFB24/php/main.php?username=Google&email=user@mail.com
// echo $_GET['username'];
// echo $_GET['email'];

if(isset($_POST['submit'])) {
    var_dump($_POST);
}