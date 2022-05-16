<?php
    class LoginUser{
        public function __construct()
        {
            $this->read();
        }

        public function read(){
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

            include_once '././config/Database.php';
            include_once '././models/UserForms.php';

            $database = new Database();
            $db = $database->connect();

            $forms = new UserForms($db);
            $form_arr = array();
            $data = json_decode(file_get_contents('php://input'));

            $forms->mobile_number = isset($_GET['mobile_number']) ? $_GET['mobile_number'] : die();
            $forms->password =  isset($_GET['password']) ? $_GET['password'] : die();

          $stmt =  $forms->loginUser();

           if($stmt->rowCount() > 0){
               
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $form_arr = array(
                        "status" => true,
                        "message" => "Successfully login!",
                        "user_id" => $row['user_id'],
                        "first_name" => $row['first_name'],
                        "last_name" => $row['last_name'],
                        "user_status" => $row['user_status'],
                        "user_type" => $row['user_type']
                    );
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