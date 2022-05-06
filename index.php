<?php
    include './route/route.php';

    include './api/UserController/create.php';
    include './api/UserController/update.php';
    include './api/UserController/read.php';
    include './api/UserController/read_single.php';
   

    $route = new Route();

    $route->add('/create', 'CreateUser'); //Create
    $route->add('/update', 'UpdateUser'); //Update
    $route->add('/read', 'ReadUser'); //Update
    $route->add('/readsingle', 'ReadSingleUser'); //Update

    $route->submit();
