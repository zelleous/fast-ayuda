<?php
    class CreateUser{
        public function __construct()
        {
            $this->run();
        }


        public function run(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

            include_once '../../config/Database.php';
            include_once '../../models/UserForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new UserForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->first_name = $data->first_name;
            $forms->middle_name = $data->middle_name;
            $forms->last_name = $data->last_name;
            $forms->birthday = $data->birthday;
            $forms->suffix = $data->suffix;
            $forms->gender = $data->gender;
            $forms->email = $data->email;
            $forms->mobile_number = $data->mobile_number;
            $forms->contact_person = $data->contact_person;
            $forms->contact_person_number = $data->contact_person_number;
            $forms->password = $data->password;
            $forms->barangay = $data->barangay;
            $forms->unit_number = $data->unit_number;
            $forms->lot_and_block_number = $data->lot_and_block_number;
            $forms->street = $data->street;
            $forms->phase = $data->phase;
            $forms->sector = $data->sector;
            $forms->valid_id = $data->valid_id;

            if ($forms->createUser()){
                echo json_encode(array(
                    'message' => 'SUCCESS'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'FAILED'
                ));
            }
        }
    }