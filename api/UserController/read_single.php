<?php
    class ReadSingleUser{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');

            include_once '../../config/database.php';
            include_once '../../models/user_forms.php';

            $forms = new UserForms($db);

            $forms->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();
            $forms->readSingleUser();
            
            $form_arr = array(
                'user_id' => $forms->user_id,
                'first_name' => $forms->first_name,
                'middle_name' => $forms->middle_name,
                'last_name' => $forms->last_name,
                'birthday' => $forms->birthday,
                'suffix' => $forms->suffix,
                'gender' => $forms->gender,
                'email' => $forms->email,
                'mobile_number' => $forms->mobile_number,
                'contact_person' =>$forms->contact_person,
                'contact_person_number' => $forms->contact_person_number,
                'barangay' => $forms->barangay,
                'unit_number' => $forms->unit_number,
                'lot_and_block_number' => $forms->lot_and_block_number,
                'street' => $forms->street,
                'phase' => $forms->phase,
                'civil_status' => $forms->civil_status,
                'name_of_spouse' => $forms->name_of_spouse,
                'blood_type' => $forms->blood_type,
                'voter' => $forms->voter,
                'precint_number' => $forms->precint_number,
                'sector' => $forms->sector,
                'valid_id' => $forms->valid_id,
                'user_status' => $forms->user_status,
                'user_type' => $forms->user_type,
                'user_created' => $forms->user_created,
                'user_updated' => $forms->user_updated
            );
            print_r(json_encode($form_arr));
            }
        }