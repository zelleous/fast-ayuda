<?php
    class DeleteUser{
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
            include_once '././models/UserForms.php';

            $databse = new Database();
            $db = $databse->connect();

            $forms = new UserForms($db);

            $data = json_decode(file_get_contents('php://input'));

            $forms->user_id = $data->user_id;

            if ($forms->deleteUser()){
                echo json_encode(array(
                    'message' => 'User deleted'
                ));
            }else{
                echo json_encode(array(
                    'message' => 'Failed user deletion'
                ));
            }
        }
    }