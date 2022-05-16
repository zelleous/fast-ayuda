<?php
    class DeleteTrans{
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
            include_once '././models/TransForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new TransForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->transaction_id = $data->transaction_id;

            if ($forms->deleteTransaction()){
                echo json_encode(array(
                    'message' => 'Transaction deleted'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed transaction deletion'
                ));
            }
        }
    }