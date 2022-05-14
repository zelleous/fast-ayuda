<?php
    include './route/route.php';

    foreach (glob("api/UserController/*.php") as $filename){
        include $filename;
    }

    foreach (glob("api/TransactionController/*.php") as $filename){
        include $filename;
    }

    foreach (glob("api/ProgramController/*.php") as $filename){
        include $filename;
    }

    foreach (glob("api/ScheduleController/*.php") as $filename){
        include $filename;
    }

    foreach (glob("api/ScheduleController/*.php") as $filename){
        include $filename;
    }


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
    $route->add('/createsched', 'CreateSched'); //Create
    $route->add('/updatesched', 'UpdateSched'); //Update
    $route->add('/readsched', 'ReadSched'); //Read
    $route->add('/readsinglesched', 'ReadSingleSched'); //Read Single
    $route->add('/deletesched', 'DeleteSched'); //Delete



    $route->submit();
