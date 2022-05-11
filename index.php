<?php
    include './route/route.php';

    include './api/UserController/CreateUser.php';
    include './api/UserController/UpdateUser.php';
    include './api/UserController/ReadUser.php';
    include './api/UserController/ReadSingleUser.php';
    include './api/UserController/DeleteUser.php';
    include './api/UserController/LoginUser.php';
    include './api/TransactionController/CreateTrans.php';
    include './api/TransactionController/UpdateTrans.php';
    include './api/TransactionController/ReadTrans.php';
    include './api/TransactionController/ReadSingleTrans.php';
    include './api/TransactionController/DeleteTrans.php';
    include './api/ProgramController/CreateProg.php';
    include './api/ProgramController/UpdateProg.php';
    include './api/ProgramController/ReadProg.php';
    include './api/ProgramController/ReadSingleProg.php';
    include './api/ProgramController/DeleteProg.php';

   

    $route = new Route();

    $route->add('/create', 'CreateUser'); //Create
    $route->add('/update', 'UpdateUser'); //Update
    $route->add('/read', 'ReadUser'); //Read
    $route->add('/readsingle', 'ReadSingleUser'); //Read Single
    $route->add('/delete', 'DeleteUser'); //Delete
    $route->add('/login', 'LoginUser'); //Delete
    $route->add('/createtrans', 'CreateTrans'); //Create
    $route->add('/updatetrans', 'UpdateTrans'); //Update
    $route->add('/readtrans', 'ReadTrans'); //Read
    $route->add('/readsingletrans', 'ReadSingleTrans'); //Read Single
    $route->add('/deleteprog', 'DeleteProg'); //Delete
    $route->add('/createprog', 'CreateProg'); //Create
    $route->add('/updateprog', 'UpdateProg'); //Update
    $route->add('/readprog', 'ReadProg'); //Read
    $route->add('/readsingleprog', 'ReadSingleProg'); //Read Single
    $route->add('/deleteprog', 'DeleteProg'); //Delete

    $route->submit();
