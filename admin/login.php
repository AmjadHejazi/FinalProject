<?php






if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['addbook'])) {
        header("location:http://localhost/%D9%85%D8%AC%D9%84%D8%AF%20%D8%AC%D8%AF%D9%8A%D8%AF%20(2)/admin/add.php");
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['offbook'])) {
        header("location:http://localhost/%D9%85%D8%AC%D9%84%D8%AF%20%D8%AC%D8%AF%D9%8A%D8%AF%20(2)/admin/off.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input class="login" type="submit" value="إضافة كتاب" name="addbook">
        <input class="login" type="submit" value="عرض جميع الكتب" name="offbook">

    </form>
</body>

</html>