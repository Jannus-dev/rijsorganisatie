<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/wachtwoord-vergeten.css">
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
                <li><a href="bestemmingen.php">Bestemmingen</a></li>
                <li><a href="willekeurig.php">Willekeurig</a></li>
                <li>
                    <div class="box">
                        <img src="../img-reisbureau\linkervleugel.png" alt="">
                        <a href="login.php">Login</a>
                        <img src="../img-reisbureau\rechtervleugel.png" alt="">
                    </div>
                </li>
            </ul>
        </header>
     
            <div class="box-form-forgor">
                <div class="h1box">
                    <h2>Wachtwoord vergeten</h2>
                </div>
                <form name="login" action="../index.php" method="post">
                    <input type="text" name="email" placeholder="Email" required autofocus>
                    <input type="submit" name="login" value="Verzend email" require_once>
                </form>
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