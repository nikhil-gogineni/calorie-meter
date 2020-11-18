<div class="footer-container">
    <div>
        <h2 class="logo footer-logo">Calorie Meter</h2>
        <p class="footer-tagline">Count on your calories</p>
    </div>
    <ul>
        <li>
            <a href=<?php
                    $urlString = explode("/", $_SERVER['REQUEST_URI']);
                    echo "/" . $urlString[1];
                    ?>>Home</a>
        </li>
        <li><a href=<?php
                    $urlString = explode("/", $_SERVER['REQUEST_URI']);
                    echo "/" . $urlString[1] . "/calorie-record";
                    ?>>Calorie Record</a>
        </li>
    </ul>
</div>