<?php 

class CalorieRecord extends Controller {

    public static $calorieCollection = [];
    
    public static function onLoad($viewName){
        
        // Redirects to Sign in page if no user found
        if(!isset($_COOKIE['user_email'])){
            header('Location: sign-in');
        }

        $getItemsQuery = "SELECT * from calorie_count where user_id = :user_id";
        $queryParams = array("user_id" => $_COOKIE['user_id']);
        $result = Database::query($getItemsQuery, $queryParams);
        self::processData($result);
        require_once("./views/$viewName.php");
    }

    public static function processData($result){
        $dates = new stdClass();
        foreach($result as $record){
            if(isset($dates->{$record['date']})){
                $dates->{$record['date']} = $dates->{$record['date']} + $record['calories']; 
            }else{
                $dates->{$record['date']} = $record['calories'];
            }
        }
        self::$calorieCollection = $dates;
    }

    public static function getMonth($month){
        switch($month){
            case "1":
            case "01": return "Jan";
            case "2":
            case "02": return "Feb";
            case "3":
            case "03": return "Mar";
            case "4":
            case "04": return "Apr"; 
            case "5":
            case "05": return "May"; 
            case "6":
            case "06": return "Jun"; 
            case "7":
            case "07": return "Jul";
            case "8":
            case "08": return "Aug"; 
            case "9":
            case "09": return "Sept";
            case "10": return "Oct"; 
            case "11": return "Nov";
            case "12": return "Dec";
        }
    }

    public static function formatDate($date){
        $dateSplit = explode("/", $date);
        return $dateSplit[0] . "  " . self::getMonth($dateSplit[1]) . "  " . $dateSplit[2];
    }

}
