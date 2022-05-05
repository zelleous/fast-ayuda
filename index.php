<?php
    include './route/Route.php';

    include './api/UserController/CreateUser.php';
    include './api/UserController/UpdateUser.php';
    include './api/UserController/ReadUser.php';
    include './api/UserController/ReadSingleUser.php';
   

    $route = new Route();

    $route->add('/create', 'CreateUser'); //Create
    $route->add('/update', 'UpdateUser'); //Update
    $route->add('/read', 'ReadUser'); //Update
    $route->add('/readsingle', 'ReadSingleUser'); //Update

    $route->submit();
