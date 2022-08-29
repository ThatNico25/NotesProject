<?php
    session_start();
    $message = " ";

    $host="127.0.0.1";
    $user="root";
    $password="";
    $db="projectnotesphp";

    $maindb = mysqli_connect($host, $user, $password);

    $dom = new DOMDocument('1.0', 'iso-8859-1');
    $dom->validateOnParse = true;

    mysqli_select_db($maindb, $db);

    global $username;

    if(isset($_POST['Username']) && isset($_POST['submit'])) {
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $_SESSION["Username"] = $username;

        $sql = "SELECT * FROM loginform WHERE User='".$username."' AND Pass='".crypt($password, '$1$rasmusle$rISCgZzpwk3UhDidwXvin0')."' LIMIT 1";
        $result = mysqli_query($maindb, $sql);

        if(mysqli_num_rows($result) == 1) {
            $message = " ";
            header("Location: mainPage.php");
            exit();    
        }
        else if($username != "" && $password != "") {
            echo "<script> alert(\"Wrong Username/Password!\");</script>";
        }
        else {
            $message = " ";
        }
    }

    if(isset($_POST['Register_btn'])) {
        $sql = "SELECT * FROM loginform WHERE User='".$_POST['Username']."' AND Pass='".crypt($_POST['Password'], '$1$rasmusle$rISCgZzpwk3UhDidwXvin0')."' LIMIT 1";
        $result = mysqli_query($maindb, $sql);

        if(mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO loginform (`User`, `Pass`) VALUES ('".$_POST['Username']."', '".crypt($_POST['Password'], '$1$rasmusle$rISCgZzpwk3UhDidwXvin0')."');";
            $result = mysqli_query($maindb, $sql);    
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Notes Taker </title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="background.png">
    </head>
    <body>
        <h1 id="title"> Welcome to Notes Taker!</h1>
        <div>
            <form id="id_form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <p class="loginText"> Login </p>
                <div class="form_input">
                    <input type="text" name="Username" id="user" placeholder=" Enter your username!" required/>
                </div>
                <div class="form_input">
                    <input type="password" name="Password" id="pass" placeholder=" Enter your password!" required/>
                </div>
                <input type="submit" name="submit" value="Login" class="btn-login"/>
                <input type="submit" name="Register_btn" value="Register" class="btn-register"/>
            </form>
        </div>
        <h1 id="author"> Made by Nicolas Poulin</h1>
    </body>
</html>