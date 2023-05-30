<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['SignUp'])) {
        $UserName = $_POST['UserName'];
        $Passeord = $_POST['Password'];
        $error = "";
        $singup_state = true;
        if (empty($UserName) && empty($Passeord)) {
            $error = "UserName OR Password Erorr";
            $singup_state = false;
        }
        if ($singup_state == true) {
            $success = "success proccess";
            header("location:http://localhost/book/admin/login.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            width: 600px;
            margin: 50px auto;
            border: 4px solid cornflowerblue;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        div {
            position: relative;
        }

        form label {
            display: relative;
        }

        input {
            display: block;
            width: 280px;
            height: 40px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            background-color: transparent;
            margin-top: 5px;
        }

        .error {
            color: red;
        }

        p {
            display: block;
            color: red;
            margin-bottom: 10px;
        }

        h1 {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login {
            color: azure;
            background-color: cornflowerblue;
            font-weight: bolder;
            font-size: 16px;
            border: none;
            transition: 0.5s;

        }

        .login:hover {
            box-shadow: 0px 0px 3px black;

        }

        .success {
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px 0px;
            margin: 10px 0px;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <h1> تسجيل الدخول إلى المكتبة مسؤول</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div>
            <?php if (isset($success)) {
                echo "<h6 class='success'>" . $success . "</h6>";
            } ?>

            <label for="">UserName:</label>

            <input type="text" name="UserName" value="<?php if (isset($UserName)) {
                                                            echo $UserName;
                                                        } ?>">


        </div>

        <div>
            <label for="">Passeord:</label>
            <input type="Passeord" name="Password" value="<?php if (isset($Passeord)) {
                                                                echo $Passeord;
                                                            } ?>">

        </div>
        <p class="error"><?php if (isset($error)) {
                                echo   $error;
                            } ?></p>
        <input class="login" type="submit" value="SignUp" name="SignUp">

    </form>
</body>

</html>