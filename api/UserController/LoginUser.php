<?php
    class LoginUser{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST,GET');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

            include_once '././config/Database.php';
            include_once '././models/UserForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new UserForms($db);
            $form_arr = array();
            $data = json_decode(file_get_contents('php://input'));

            $forms->mobile_number = $data->mobile_number;
            $forms->password =  $data->password;

          $stmt =  $forms->loginUser();

           if($stmt){
               if($forms->user_status == 0){
                   $form_arr = (array("message"=>"please activate your account"));
               }
               else{ 
                    $form_arr = array(
                        "status" => true,
                        "message" => "Successfully login!",
                        "user_id" => $forms->user_id,
                        "first_name" => $forms->first_name,
                        "last_name" => $forms->last_name,
                        "user_status" => $forms->user_status,
                        "user_type" => $forms->user_type
                    );
				}
		   }
           else{
               $form_arr = array(
                "status" => false,
                "message" => "Invalid mobile number and/or password."
               );
		   }
			
           print_r(json_encode($form_arr));   
        }
    }
