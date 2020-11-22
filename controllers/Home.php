<?php 

class Home extends Controller {

    public static $todayCalorieData = [];
    
    public static function onLoad($viewName){
        
        // Redirects to Sign in page if no user found
        if(!isset($_COOKIE['user_email'])){
            header('Location: sign-in');
        }
        
        if(isset($_POST['food'])){
            self::updateRecord($_POST['food'], $_POST['calories']);
            header("Location: index.php");
        }

        if(isset($_FILES['uploadedFile'])){
            self::uploadFileData();
        }

        $getItemsQuery = "SELECT * from calorie_count where user_id = :user_id and date = :current_date";
        $queryParams = array("user_id" => $_COOKIE['user_id'], "current_date" => self::getCurrentDate());
        self::$todayCalorieData = Database::query($getItemsQuery, $queryParams);
        require_once("./views/$viewName.php");
    }

    public static function updateRecord($food, $calories){
        $query = "INSERT into calorie_count ( user_id, date, item, calories) VALUES (:user_id, :current_date, :food, :calories)";
        $queryParams = array("user_id" => $_COOKIE['user_id'], "current_date" => self::getCurrentDate(), "food" => $food, "calories" => $calories);
        Database::query($query, $queryParams);
    }

    public static function getCurrentDate(){
        date_default_timezone_set(timezone_name_from_abbr("EST"));
        $currentDate = date('d/m/Y') . "";
        return $currentDate;
    }


    public static function uploadFileData(){
        $hndFile = fopen($_FILES['uploadedFile']['tmp_name'], "r");
        while (!feof($hndFile)) {
            $strLine = fgets($hndFile);
            if ($strLine != "" && $strLine != "\n") {
                $varSplit = explode(",", $strLine);
                print_r($varSplit);
                self::updateRecord($varSplit[0], $varSplit[1]);
            }
        }
        fclose($hndFile);
        header("Location: index.php");
    }

}
