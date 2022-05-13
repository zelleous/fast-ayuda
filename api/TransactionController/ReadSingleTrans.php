<?php
    class ReadSingleTrans{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/TransForms.php';
            
            $databse = new Database();
            $db = $databse->connect();

            $forms = new TransForms($db);

            $forms->transaction_id = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : die();
            $forms->readSingleTransaction();
            
            $form_arr = array(
                'transaction_id' => $forms->transaction_id,
                'beneficiary' => $forms->beneficiary,
                'service' => $forms->service,
                'date' => $forms->date,
                'location' => $forms->location,
                'time' => $forms->time,
                'status' => $forms->status,
                'ref_number' => $forms->ref_number,
                'trans_created' => $forms->trans_created,
                'trans_updated' => $forms->trans_updated
            );
            print_r(json_encode($form_arr));
            }
        }