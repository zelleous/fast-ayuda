<?php
    class DeleteSched{
        public function __construct()
        {
            $this->run();
        }

        public function run(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');
            header('Access-Control-Allow-Methods: DELETE');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

            include_once '././config/Database.php';
            include_once '././models/SchedForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new SchedForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->sched_id = $data->sched_id;

            if ($forms->deleteSchedule()){
                echo json_encode(array(
                    'message' => 'Schedule deleted'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed schedule deletion'
                ));
            }
        }
    }