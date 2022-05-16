<?php
    class ReadProg{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/ProgramForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new ProgramForms($db);
            $results = $forms->readAllProgram();

            $num = $results->rowCount();

            if($num>0){

                $form_arr = array();
                $form_arr['data']= array();

                while ($row = $results->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    $request = array(
                        'program_id' => $program_id,
                        'name' => $name,
                        'type' => $type,
                        'details' => $details,
                        'required_sector' => $required_sector,
                        'program_view' => $program_view,
                        'program_status' => $program_status,
                        'program_created' => $program_created,
                        'program_updated' => $program_updated
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
