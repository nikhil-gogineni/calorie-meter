<?php
    if(isset($_GET['url'])){
        switch($_GET['url']){
            case 'sign-in': {
                Route::set('sign-in', function(){
                    SignIn::createView('SignIn');
                });
                break;
            }
            case 'calorie-record': {
                Route::set('calorie-record', function(){
                    CalorieRecord::createView('CalorieRecord');
                });
                break;
            }
            case 'not-found': {
                Route::set('not-found', function(){
                    NotFound::createView('NotFound');
                });
                break;
            }
            default: {
                header('Location: not-found');
            }
        }
    }
    else{
            Home::createView('Home');
    }


?>
