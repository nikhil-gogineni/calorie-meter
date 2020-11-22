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
        <h3 class="home-greetings">Welcome Back,</h3>
        <h4 class="home-tagline">Track your calories to meet your goals!</h4>
        <h3 class="home-add-calories-title">Add Calories</h3>
        <div class="add-calories-container">
            <div>
                <form action="index.php" method="post">
                    <input placeholder="Food" class="home-input" autocomplete="off" name="food" />
                    <input placeholder="Calories count" class="home-input" autocomplete="off" name="calories" />
                    <button class="btn-add-calories">Add Calories</button>
                </form>
            </div>
            <div>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <p>Or choose to upload a file with the records?</p>
                    <input type="file" name="uploadedFile" class="home-choose-file">
                    <button class="btn-add-calories mt-20">Submit Document</button>
                    <p>* File should be in .txt format</p>
                </form>
            </div>
        </div>
        <h3 class="home-add-calories-title m-40">Today's Calorie Intake</h3>
        <?php
        if (sizeOf(self::$todayCalorieData) == 0) {
            echo "<div class='no-calories-warning'>You don't have any calories recorded yet!</div>";
        } else {
            $tableString = "<table id='calories-table'><thead><th>Item</th><th>Calories</th><th>Action</th></thead><tbody>";
            $totalCalories = 0;
            foreach (self::$todayCalorieData as $val) {
                $deleteLink = "<a class='delete-link' href='index.php?delete=".$val[0]."'>Delete</a>";
                $label = $val[3];
                $calory = $val[4];
                $totalCalories = $totalCalories + $calory;
                $tableString = $tableString . "<tr><td>" . $label . "</td><td>" . $calory . "</td><td>". $deleteLink . "</td></tr>";
            };
            $tableString = $tableString . "</tbody></table>";
            echo "<div class='total-calories'>Total Calories: " . $totalCalories . " cals.</div>";
            echo $tableString;
        }
        ?>
    </div>
    <?php require_once("./controls/footer.php") ?>
</body>

</html>