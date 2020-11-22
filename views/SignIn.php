<html>

<head>
    <title><?php echo self::$pageTitle ?></title>
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/sign-in.css" />
    <link rel="stylesheet" href="css/home.css" />
</head>

<body>
    <?php require_once("./controls/header.php") ?>
    <div class="main">
        <h3 class="home-greetings">Login</h3>
        <h4 class="home-tagline">To continue, Please enter your email ID</h4>
        <form action="sign-in" method="post">
            <input placeholder="Email" class="custom-input" name="email" type="email" required/>
            <button class="btn-add-calories">LOGIN</button>
        </form>
    </div>
    <?php require_once("./controls/footer.php") ?>
</body>

</html>