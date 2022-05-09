<?php
    class CreateTrans{
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
            include_once '././models/TransForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new TransForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->beneficiary = $data->beneficiary;
            $forms->service = $data->service;
            $forms->date = $data->date;
            $forms->location = $data->location;
            $forms->time = $data->time;
            $forms->status = $data->ref_number;
            $forms->ref_number = $data->ref_number;

            if ($forms->createTransaction()){
                echo json_encode(array(
                    'message' => 'Transaction created'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed user creation'
                ));
            }
        }
    }