<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Laila:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background">
        <header>
            <div class="logo">
                <a href="../index.php">
                    <img src="../img-reisbureau\main-logo.jpg" alt="Logo">
                </a>
            </div>
            <ul>
                <li><a href="willekeurig.php">Bestemmingen</a></li>
                <li>
                    <div class="box">
                        <img src="../img-reisbureau\linkervleugel.png" alt="">
                        <a href="login.php">Login</a>
                        <img src="../img-reisbureau\rechtervleugel.png" alt="">
                    </div>
                </li>
            </ul>
        </header>
        <div class="box-form-login-register">
            <div class="box-form-login">
                <div class="h1box">
                    <h1>Login</h1>
                </div>
                <form name="login" action="check_login.php" method="POST">
                    <input type="text" name="email" placeholder="Email" required autofocus>
                    <input type="password" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord" required>
                    <input type="submit" name="login" value="Login">
                    <div class="checkbox-container">
                        <div class="checkbox-box">
                            <input type="checkbox" id="check" name="check" onclick="myFunction()">
                            <label>Toon wachtwoord</label>
                        </div>
                        <a href="wachtwoord-vergeten.php">wachtwoord vergeten?</a>
                    </div>

                </form>
            </div>
            <a href="registreer.php">
                <div class="register">
                    <input type="submit" name="registreer" value="registreer" require_once>
                </div>
            </a>
        </div>
    </div>

    <?php include_once("../footer.php"); ?>
</body>
<script>
    function myFunction() {
        const x = document.getElementById("wachtwoord");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>