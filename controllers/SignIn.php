<?php 

class SignIn extends Controller {

    public static function onLoad($viewName){
        if(isset($_POST['email'])){
            $result = self::getUserByEmail($_POST['email']);
            if(sizeof($result) == 1){
                // user exists in database
                // redirecting to home
                setcookie("user_email", $_POST['email'], time()+3600, "/");
                setcookie("user_id", $result[0]['user_id'], time()+3600, "/");
            }else{
                // user doesn't exists in database
                // creating new user
                $result = self::createUser($_POST['email']);
                $userDetails = self::getUserByEmail($_POST['email']);
                setcookie("user_email", $_POST['email'], time()+3600, "/");
                setcookie("user_id", $userDetails[0]['user_id'], time()+3600, "/");
            }
            header('Location: index.php');
        }
        require_once("./views/$viewName.php");
    }

    private static function getUserByEmail($email){
        $query = 'SELECT user_id, email from users where email = :email';
        $queryParams = array('email' => $email);
        $result = Database::query($query, $queryParams);
        return $result;
    }

    private static function createUser($currentEmail){
        $query = "INSERT INTO USERS ( email ) values (:currentEmail)";
        $queryParams = array('currentEmail' => $currentEmail);
        $result = Database::query($query, $queryParams);
        return $result;
    }

}
?>