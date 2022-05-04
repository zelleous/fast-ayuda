<?php
    include './route/Route.php';

    include './api/UserController/CreateUser.php';
    include './api/UserController/UpdateUser.php';

    $route = new Route();

    $route->add('/create', 'CreateUser'); //Create
    $route->add('/update', 'UpdateUser'); //Update

    $route->submit();