<?php
    class UpdateSched{
        public function __construct()
        {
            $this->run();
        }


        public function run(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');
            header('Access-Control-Allow-Methods: PUT');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

            include_once '././config/Database.php';
            include_once '././models/SchedForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new SchedForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->sched_id = $data->sched_id;
            $forms->name = $data->name;
            $forms->location = $data->location;
            $forms->start_date = $data->start_date;
            $forms->end_date = $data->end_date;

            if ($forms->updateSchedule()){
                echo json_encode(array(
                    'message' => 'Schedule updated'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed schedule update'
                ));
            }
        }
    }