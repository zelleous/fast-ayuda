<?php
    class UpdateTrans{
        public function __construct()
        {
            $this->run();
        }

        public function run(){
            header('Access-Control-Allow-Origins: *');
            header ('Content-Type: application/x-www-form-urlencoded');
            header('Access-Control-Allow-Methods: PUT');
            header('Access-Control-Allow-Header: Accecs-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization');

            include_once './config/Database.php';
            include_once './models/Forms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new TransForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->transaction_id = $data->transaction_id;
            $forms->beneficiary = $data->beneficiary;
            $forms->service = $data->service;
            $forms->date = $data->date;
            $forms->location = $data->location;
            $forms->time = $data->time;
            $forms->status = $data->status;
            $forms->ref_number = $data->ref_number;
            $forms->trans_created = $data->trans_created;
            $forms->trans_updated = $data->trans_updated;

            if ($forms->updateTransaction()){
                echo json_encode(array(
                    'message' => 'SUCCESS'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'FAILED'
                ));
            }
        }
    }