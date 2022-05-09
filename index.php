<?php
    include './route/route.php';

    include './api/UserController/CreateUser.php';
    include './api/UserController/UpdateUser.php';
    include './api/UserController/ReadUser.php';
    include './api/UserController/ReadSingleUser.php';
    include './api/UserController/DeleteUser.php';
    include './api/TransactionController/CreateTrans.php';
    include './api/TransactionController/UpdateTrans.php';
    include './api/TransactionController/ReadTrans.php';
    include './api/TransactionController/ReadSingleTrans.php';
    include './api/TransactionController/DeleteTrans.php';

   

    $route = new Route();

    $route->add('/create', 'CreateUser'); //Create
    $route->add('/update', 'UpdateUser'); //Update
    $route->add('/read', 'ReadUser'); //Read
    $route->add('/readsingle', 'ReadSingleUser'); //Read Single
    $route->add('/delete', 'DeleteUser'); //Delete
    $route->add('/createtrans', 'CreateTrans'); //Create
    $route->add('/updatetrans', 'UpdateTrans'); //Update
    $route->add('/readtrans', 'ReadTrans'); //Read
    $route->add('/readsingletrans', 'ReadSingleTrans'); //Read Single
    $route->add('/deletetrans', 'DeleteTrans'); //Delete

    $route->submit();
