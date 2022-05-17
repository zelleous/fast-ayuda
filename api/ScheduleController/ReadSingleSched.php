<?php
    class ReadSingleSched{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/SchedForms.php';
            
            $database = new Database();
            $db = $database->connect();

            $forms = new SchedForms($db);

            $forms->sched_id = isset($_GET['sched_id']) ? $_GET['sched_id'] : die();
            $forms->readSingleSchedule();
            
            $form_arr = array(
                'sched_id' => $forms->sched_id,
                'name' => $forms->name,
                'location' => $forms->location,
                'start_date' => $forms->start_date,
                'end_date' => $forms->end_date,
                'sched_created' => $forms->sched_created,
                'sched_updated' => $forms->sched_updated
            );
            print_r(json_encode($form_arr));
            }
        }