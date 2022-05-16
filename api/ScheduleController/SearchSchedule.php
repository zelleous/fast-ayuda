<?php
    class SearchSched{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/SchedForms.php';
            
            $databse = new Database();
            $db = $databse->connect();

            $forms = new SchedForms($db);

            $forms->name = isset($_GET['name']) ? $_GET['name'] : die();
            
            $results = $forms->searchSchedule();

            $num = $results->rowCount();

            if($num>0){

                $form_arr = array();
                $form_arr['data']= array();

                while ($row = $results->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    $request = array(
                        'location' => $location,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
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
