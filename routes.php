<?php

    if(isset($_GET['url'])){
        Route::set('help', function(){
            echo "help";
        });
    
    }
    else{
        // Route::set('home', function(){
            Home::createView('Home');
        // });
    }

    
    
?>