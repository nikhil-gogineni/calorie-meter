<nav>
    <h2 class="logo">Calorie Meter</h2>
    <ul class="nav-items">
        <li><a href=<?php 
          $urlString = explode("/", $_SERVER['REQUEST_URI']);
          echo "/" . $urlString[1];
        ?>>Home</a></li>
        <li><a href=<?php 
          $urlString = explode("/", $_SERVER['REQUEST_URI']);
          echo "/" . $urlString[1] . "/calorie-record";
        ?>>Calorie Record</a></li>
    </ul>
</nav>