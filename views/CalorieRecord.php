<html>

<head>
    <title><?php echo self::$pageTitle ?></title>
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/home.css" />
</head>

<body>
    <?php require_once("./controls/header.php") ?>
    <?php require_once("./controls/user-view.php") ?>
    <div class="main">
        <h3 class="home-greetings">Calorie Record</h3>
        <h4 class="home-tagline">All time calorie record.</h4>
        <?php
        if (sizeOf(array_keys(get_object_vars(self::$calorieCollection))) == 0) {
            echo "<div class='no-calories-warning'>You don't have any calories recorded yet!</div>";
        } else {
            $tableString = "<table id='calories-table'><thead><th>Date</th><th>Calories</th></thead><tbody>";
            foreach (array_keys(get_object_vars(self::$calorieCollection)) as $date) {
                $tableString = $tableString . "<tr><td>" . self::formatDate($date) . "</td><td>" . self::$calorieCollection->$date . "</td></tr>";
            };
            $tableString = $tableString . "</tbody></table>";
            echo $tableString;
        }

        ?>
    </div>
    <?php require_once("./controls/footer.php") ?>
</body>

</html>