<?php
    class CreateProg{
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
            include_once '././models/ProgramForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new ProgramForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->name = $data->name;
            $forms->type = $data->type;
            $forms->details = $data->details;
            $forms->required_sector = $data->required_sector;
            $forms->program_view = $data->program_view;
            $forms->program_status = $data->program_status;
        
            if ($forms->createProgram()){
                echo json_encode(array(
                    'message' => 'Program created'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed program creation'
                ));
            }
        }
    }