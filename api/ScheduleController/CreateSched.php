<?php
    class CreateSched{
        public function __construct()
        {
            $this->run();
        }

        public function run(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

            include_once '././config/Database.php';
            include_once '././models/SchedForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new SchedForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->name = $data->name;
            $forms->location = $data->location;
            $forms->start_date = $data->start_date;
            $forms->end_date = $data->end_date;
        
            if ($forms->createSchedule()){
                echo json_encode(array(
                    'message' => 'Schedule created'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed schedule creation'
                ));
            }
        }
    }