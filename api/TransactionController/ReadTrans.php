<?php
    class ReadTrans{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/TransForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new TransForms($db);
            $results = $forms->readAllTransaction();

            $num = $results->rowCount();

            if($num>0){

                $form_arr = array();
                $form_arr['data']= array();

                while ($row = $results->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    $request = array(
                        'transaction_id' => $transaction_id,
                        'beneficiary' => $beneficiary,
                        'service' => $service,
                        'date' => $date,
                        'location' => $location,
                        'time' => $time,
                        'status' => $status,
                        'ref_number' => $ref_number,
                        'trans_created' => $trans_created,
                        'trans_updated' => $trans_updated
                    );

                    array_push($form_arr['data'],$request);
                }

                echo json_encode($form_arr);
            }
            else{
                $form_arr = array();
                $form_arr['data'] = array(
                    'message' => 'No Request'
                );

                echo json_encode($form_arr);
            }
        }
    }
