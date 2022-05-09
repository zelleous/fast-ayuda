<?php
    class ReadSingleProg{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/ProgramForms.php';
            
            $databse = new Database();
            $db = $databse->connect();

            $forms = new ProgramForms($db);

            $forms->program_id = isset($_GET['program_id']) ? $_GET['program_id'] : die();
            $forms->readSingleProgram();
            
            $form_arr = array(
                'program_id' => $forms->program_id,
                'name' => $forms->name,
                'type' => $forms->type,
                'details' => $forms->details,
                'program_status' => $forms->program_status,
                'program_view' => $forms->program_view,
                'program_created' => $forms->program_created,
                'program_updated' => $forms->program_updated
            );
            print_r(json_encode($form_arr));
            }
        }