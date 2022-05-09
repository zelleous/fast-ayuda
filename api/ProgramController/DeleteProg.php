<?php
    class DeleteProg{
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
            include_once '././models/ProgramForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new ProgramForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->program_id = $data->program_id;

            if ($forms->deleteProgram()){
                echo json_encode(array(
                    'message' => 'Program deleted'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed program deletion'
                ));
            }
        }
    }