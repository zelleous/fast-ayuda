<?php
    class ReadSingleTransUser{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/TransForms.php';
            
            $database = new Database();
            $db = $database->connect();

            $forms = new TransForms($db);

            $forms->transaction_id = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : die();
            $forms->readSingleTransUser();
            
            $form_arr = array(
                'transaction_id' => $forms->transaction_id,
                'user_id' => $forms->user_id,
                'first_name' => $forms->first_name,
                'middle_name' => $forms->middle_name,
                'last_name' => $forms->last_name,
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