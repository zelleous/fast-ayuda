<?php
    class UpdateUser{
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
            include_once '././models/UserForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new UserForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->user_id = $data->user_id;
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
            $forms->civil_status = $data->civil_status;
            $forms->name_of_spouse = $data->name_of_spouse;
            $forms->blood_type = $data->blood_type;
            $forms->voter= $data->voter;
            $forms->precint_number = $data->precint_number;
            $forms->sector = $data->sector;
            $forms->valid_id = $data->valid_id;

            if ($forms->updateUser()){
                echo json_encode(array(
                    'message' => 'User updated'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed user update'
                ));
            }
        }
    }