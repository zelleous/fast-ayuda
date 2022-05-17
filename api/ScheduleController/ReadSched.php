<?php
    class ReadSched{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/SchedForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new SchedForms($db);
            $results = $forms->readAllSchedule();

            $num = $results->rowCount();

            if($num>0){

                $form_arr = array();
                $form_arr['data']= array();

                while ($row = $results->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    $request = array(
                        'sched_id' => $sched_id,
                        'name' => $name,
                        'location' => $location,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'sched_created' => $sched_created,
                        'sched_updated' => $sched_updated
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
