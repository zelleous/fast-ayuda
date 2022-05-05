<?php
    class ReadUser{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header ('Content-Type: application/json');

            include_once '././config/Database.php';
            include_once '././models/UserForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new UserForms($db);
            $results = $forms->readAll();

            $num = $results->rowCount();

            if($num>0){

                $form_arr = array();
                $form_arr['data']= array();

                while ($row = $results->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    $request = array(
                        'user_id' => $user_id,
                        'first_name' => $first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $last_name,
                        'birthday' => $birthday,
                        'suffix' => $suffix,
                        'gender' => $gender,
                        'email' => $email,
                        'mobile_number' => $mobile_number,
                        'contact_person' => $contact_person,
                        'contact_person_number' => $contact_person_number,
                        'password' => $password,
                        'barangay' => $barangay,
                        'unit_number' => $unit_number,
                        'lot_and_block_number' => $lot_and_block_number,
                        'street' => $street,
                        'phase' => $phase,
                        'civil_status' => $civil_status,
                        'name_of_spouse' => $name_of_spouse,
                        'blood_type' => $blood_type,
                        'voter' => $voter,
                        'precint_number' => $precint_number,
                        'sector' => $sector,
                        'valid_id' => $valid_id,
                        'user_status' => $user_status,
                        'user_type' => $user_type,
                        'user_created' => $user_created,
                        'user_updated' => $user_updated
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
