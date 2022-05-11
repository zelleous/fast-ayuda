<?php
    class UserForms{
        private $conn;
        private $table = 'tblresidents';

        public $user_id;
        //personal information
        public $first_name;
        public $middle_name;
        public $last_name;
        public $birthday;
        public $suffix;
        public $gender;
        public $email;
        public $mobile_number;
        public $contact_person;
        public $contact_person_number;
        public $password;
        //location
        public $barangay;
        public $unit_number;
        public $lot_and_block_number;
        public $street;
        public $phase;
        //other information
        public $civil_status;
        public $name_of_spouse;
        public $blood_type;
        public $voter;
        public $precint_number;
        public $sector;
        //necessary document
        public $valid_id;
        public $user_status;
        public $user_type;
        public $user_created;
        public $user_updated;
        
        
        public function __construct($db){
            $this->conn=$db;
        }

        public function createUser(){
            $query = 'INSERT INTO ' . $this->table . '
                    SET
                        first_name = :first_name,
                        middle_name = :middle_name,
                        last_name = :last_name,
                        birthday = :birthday,
                        suffix = :suffix,
                        gender = :gender,
                        email = :email,
                        mobile_number = :mobile_number,
                        contact_person =:contact_person,
                        contact_person_number =:contact_person_number,
                        password = :password,
                        barangay = :barangay,
                        unit_number =:unit_number,
                        lot_and_block_number = :lot_and_block_number,
                        street = :street,
                        phase = :phase,
                        sector = :sector,
                        valid_id = :valid_id';
            
            $stmt = $this->conn->prepare($query);

            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->middle_name = htmlspecialchars(strip_tags($this->middle_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->birthday = htmlspecialchars(strip_tags($this->birthday));
            $this->suffix = htmlspecialchars(strip_tags($this->suffix));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->mobile_number = htmlspecialchars(strip_tags($this->mobile_number));
            $this->contact_person = htmlspecialchars(strip_tags($this->contact_person));
            $this->contact_person_number = htmlspecialchars(strip_tags($this->contact_person_number));
            $this->password = htmlspecialchars(strip_tags(hash('sha256',$this->password)));
            $this->barangay = htmlspecialchars(strip_tags($this->barangay));
            $this->unit_number = htmlspecialchars(strip_tags($this->unit_number));
            $this->lot_and_block_number = htmlspecialchars(strip_tags($this->lot_and_block_number));
            $this->street = htmlspecialchars(strip_tags($this->street));
            $this->phase = htmlspecialchars(strip_tags($this->phase));
            $this->valid_id = htmlspecialchars(strip_tags($this->valid_id));
            $this->sector = htmlspecialchars(strip_tags($this->sector));

            $stmt->bindParam(':first_name',$this->first_name);
            $stmt->bindParam(':middle_name',$this->middle_name);
            $stmt->bindParam(':last_name',$this->last_name);
            $stmt->bindParam(':birthday',$this->birthday);
            $stmt->bindParam(':suffix',$this->suffix);
            $stmt->bindParam(':gender',$this->gender);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':mobile_number',$this->mobile_number);
            $stmt->bindParam(':contact_person',$this->contact_person);
            $stmt->bindParam(':contact_person_number',$this->contact_person_number);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':barangay',$this->barangay);
            $stmt->bindParam(':unit_number', $this->unit_number);
            $stmt->bindParam(':lot_and_block_number', $this->lot_and_block_number);
            $stmt->bindParam(':street', $this->street);
            $stmt->bindParam(':phase', $this->phase);
            $stmt->bindParam(':valid_id',$this->valid_id);
            $stmt->bindParam(':sector',$this->sector);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s.\n" . $stmt->error);

            return false;
        }

        public function updateUser(){
            $query = 'UPDATE ' . $this->table . '
                    SET
                        first_name = :first_name,
                        middle_name = :middle_name,
                        last_name = :last_name,
                        birthday = :birthday,
                        suffix = :suffix,
                        gender = :gender,
                        email = :email,
                        mobile_number = :mobile_number,
                        contact_person =:contact_person,
                        contact_person_number =:contact_person_number,
                        password = :password,
                        barangay = :barangay,
                        unit_number =:unit_number,
                        lot_and_block_number = :lot_and_block_number,
                        street = :street,
                        phase = :phase,
                        civil_status = :civil_status,
                        name_of_spouse = :name_of_spouse,
                        blood_type = :blood_type,
                        voter = :voter,
                        precint_number = :precint_number,
                        sector = :sector,
                        valid_id = :valid_id
                    WHERE
                        user_id = :user_id';

            $stmt = $this->conn->prepare($query);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->middle_name = htmlspecialchars(strip_tags($this->middle_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->birthday = htmlspecialchars(strip_tags($this->birthday));
            $this->suffix = htmlspecialchars(strip_tags($this->suffix));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->mobile_number = htmlspecialchars(strip_tags($this->mobile_number));
            $this->contact_person = htmlspecialchars(strip_tags($this->contact_person));
            $this->contact_person_number = htmlspecialchars(strip_tags($this->contact_person_number));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->barangay = htmlspecialchars(strip_tags($this->barangay));
            $this->unit_number = htmlspecialchars(strip_tags($this->unit_number));
            $this->lot_and_block_number = htmlspecialchars(strip_tags($this->lot_and_block_number));
            $this->street = htmlspecialchars(strip_tags($this->street));
            $this->phase = htmlspecialchars(strip_tags($this->phase));
            $this->civil_status = htmlspecialchars(strip_tags($this->civil_status));
            $this->name_of_spouse = htmlspecialchars(strip_tags($this->name_of_spouse));
            $this->blood_type = htmlspecialchars(strip_tags($this->blood_type));
            $this->voter = htmlspecialchars(strip_tags($this->voter));
            $this->precint_number = htmlspecialchars(strip_tags($this->precint_number));
            $this->sector = htmlspecialchars(strip_tags($this->sector));
            $this->valid_id = htmlspecialchars(strip_tags($this->valid_id));

            $stmt->bindParam(':user_id',$this->user_id);
            $stmt->bindParam(':first_name',$this->first_name);
            $stmt->bindParam(':middle_name',$this->middle_name);
            $stmt->bindParam(':last_name',$this->last_name);
            $stmt->bindParam(':birthday',$this->birthday);
            $stmt->bindParam(':suffix',$this->suffix);
            $stmt->bindParam(':gender',$this->gender);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':mobile_number',$this->mobile_number);
            $stmt->bindParam(':contact_person',$this->contact_person);
            $stmt->bindParam(':contact_person_number',$this->contact_person_number);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':barangay',$this->barangay);
            $stmt->bindParam(':unit_number', $this->unit_number);
            $stmt->bindParam(':lot_and_block_number', $this->lot_and_block_number);
            $stmt->bindParam(':street', $this->street);
            $stmt->bindParam(':phase', $this->phase);
            $stmt->bindParam(':civil_status', $this->civil_status);
            $stmt->bindParam(':name_of_spouse', $this->name_of_spouse);
            $stmt->bindParam(':blood_type', $this->blood_type);
            $stmt->bindParam(':voter', $this->voter);
            $stmt->bindParam(':precint_number', $this->precint_number);
            $stmt->bindParam(':sector',$this->sector);
            $stmt->bindParam(':valid_id', $this->valid_id);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);

            return false;
        }

        public function readAll(){
                $query = 'SELECT
                user_id,
                first_name,
                middle_name,
                last_name,
                birthday,
                suffix,
                gender,
                email,
                password,
                mobile_number,
                contact_person,
                contact_person_number,
                barangay,
                unit_number,
                lot_and_block_number,
                street,
                phase,
                valid_id,
                civil_status,
                name_of_spouse,
                blood_type,
                voter,
                precint_number,
                sector,
                user_created,
                user_status,
                user_type,
                user_updated
            FROM '. $this->table . '
            ORDER BY
                user_created DESC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleUser(){
            $query = 'SELECT
                user_id,
                first_name,
                middle_name,
                last_name,
                birthday,
                suffix,
                gender,
                email,
                mobile_number,
                contact_person,
                contact_person_number,
                barangay,
                unit_number,
                lot_and_block_number,
                street,
                phase,
                valid_id,
                civil_status,
                name_of_spouse,
                blood_type,
                voter,
                precint_number,
                sector,
                valid_id,
                user_created,
                user_status,
                user_type,
                user_updated
                FROM '. $this->table . '
                WHERE 
                    user_id = ? LIMIT 0,1';
                
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->user_id);
            
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $this->user_id = $row['user_id'];
                $this->first_name = $row['first_name'];
                $this->middle_name = $row['middle_name'];
                $this->last_name = $row['last_name'];
                $this->birthday = $row['birthday'];
                $this->suffix = $row['suffix'];
                $this->gender = $row['gender'];
                $this->email = $row['email'];
                $this->mobile_number = $row['mobile_number'];
                $this->contact_person = $row['contact_person'];
                $this->contact_person_number = $row['contact_person_number'];
                $this->barangay = $row['barangay'];
                $this->unit_number = $row['unit_number'];
                $this->lot_and_block_number = $row['lot_and_block_number'];
                $this->street = $row['street'];
                $this->phase = $row['phase'];
                $this->civil_status = $row['civil_status'];
                $this->name_of_spouse = $row['name_of_spouse'];
                $this->blood_type = $row['blood_type'];
                $this->voter = $row['voter'];
                $this->precint_number = $row['precint_number'];      
                $this->sector = $row['sector'];
                $this->valid_id = $row['valid_id'];
                $this->user_created = $row['user_created'];
                $this->user_status = $row['user_status'];
                $this->user_type = $row['user_type'];
                $this->user_updated = $row['user_updated'];
            }

        public function deleteUser(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE user_id = :user_id';

            $stmt = $this->conn->prepare($query);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));

            $stmt->bindParam(':user_id',$this->user_id);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);

            return false;
        }

        public function loginUser(){
            $query = 'SELECT
                        user_id,
                        first_name,
                        last_name,
                        mobile_number,
                        password,
                        user_status,
                        user_type
                   FROM '. $this->table . '
                   WHERE 
                        mobile_number = "'.$this->mobile_number.'" AND password = "'.$this->password.'"';
            
            $stmt = $this->conn->prepare($query);
            
            // $this->mobile_number = htmlspecialchars(strip_tags($this->mobile_number));
            // $this->password = htmlspecialchars(strip_tags($this->password));

            // $stmt->bindParam(':mobile_number',$this->mobile_number);
            // $stmt->bindParam(':password',$this->password);
            
            $stmt->execute();
            return $stmt;
           
        }
    }