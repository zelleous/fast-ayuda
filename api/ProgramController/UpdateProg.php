<?php
    class UpdateProg{
        public function __construct()
        {
            $this->run();
        }


        public function run(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');
            header('Access-Control-Allow-Methods: PUT');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

            include_once '././config/Database.php';
            include_once '././models/ProgramForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new ProgramForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->program_id = $data->program_id;
            $forms->name = $data->name;
            $forms->type = $data->type;
            $forms->details = $data->details;
            $forms->required_sector = $data->required_sector;
            $forms->program_status = $data->program_status;
            $forms->program_view = $data->program_view;

            if ($forms->updateProgram()){
                echo json_encode(array(
                    'message' => 'Program updated'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed program update'
                ));
            }
        }
    }