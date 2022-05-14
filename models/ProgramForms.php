<?php
    class ProgramForms{
        private $conn;
        private $table = 'tblprograms';

        public $program_id;
        //personal information
        public $name;
        public $type;
        public $details;
        public $required_sector;
        public $program_status;
        public $program_view;
        public $program_created;
        public $program_updated;
        
        
        public function __construct($db){
            $this->conn=$db;
        }

        public function createProgram(){
            $query = 'INSERT INTO ' . $this->table . '
                    SET
                        name = :name,
                        type = :type,
                        details = :details,
                        required_sector = :required_sector,
                        program_view = :program_view,
                        program_status = :program_status';
            
            $stmt = $this->conn->prepare($query);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->type = htmlspecialchars(strip_tags($this->type));
            $this->details = htmlspecialchars(strip_tags($this->details));
            $this->required_sector = htmlspecialchars(strip_tags($this->required_sector));
            $this->program_status = htmlspecialchars(strip_tags($this->program_status));
            $this->program_view = htmlspecialchars(strip_tags($this->program_view));
          
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':type',$this->type);
            $stmt->bindParam(':details',$this->details);
            $stmt->bindParam(':required_sector',$this->required_sector);
            $stmt->bindParam(':program_status',$this->program_status);
            $stmt->bindParam(':program_view',$this->program_view);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);
        }

        public function updateProgram(){
            $query = 'UPDATE ' . $this->table . '
                    SET
                        name = :name,
                        type = :type,
                        details = :details,
                        required_sector = :required_sector,
                        program_view = :program_view,
                        program_status = :program_status
                    WHERE
                        program_id = :program_id';

            $stmt = $this->conn->prepare($query);

            $this->program_id = htmlspecialchars(strip_tags($this->program_id));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->type = htmlspecialchars(strip_tags($this->type));
            $this->details = htmlspecialchars(strip_tags($this->details));
            $this->required_sector = htmlspecialchars(strip_tags($this->required_sector));
            $this->program_status = htmlspecialchars(strip_tags($this->program_status));
            $this->program_view = htmlspecialchars(strip_tags($this->program_view));
          
            $stmt->bindParam(':program_id',$this->program_id);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':type',$this->type);
            $stmt->bindParam(':details',$this->details);
            $stmt->bindParam(':required_sector',$this->required_sector);
            $stmt->bindParam(':program_status',$this->program_status);
            $stmt->bindParam(':program_view',$this->program_view);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);
        }

        public function readAllProgram(){
                $query = 'SELECT
                    program_id,
                    name,
                    type,
                    details,
                    required_sector,
                    program_status,
                    program_view,
                    program_created,
                    program_updated

            FROM '. $this->table . '
            ORDER BY
                program_created DESC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleProgram(){
            $query = 'SELECT
                        program_id,
                        name,
                        type,
                        details,
                        required_sector,
                        program_status,
                        program_view,
                        program_created,
                        program_updated

                    FROM '. $this->table . '
                    WHERE 
                        program_id = ? LIMIT 0,1';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->program_id);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->program_id = $row['program_id'];
            $this->name = $row['name'];
            $this->type = $row['type'];
            $this->details = $row['details'];
            $this->required_sector = $row['required_sector'];
            $this->program_status = $row['program_status'];
            $this->program_view = $row['program_view'];
            $this->program_created = $row['program_created'];
            $this->program_updated = $row['program_updated'];
        }

        public function deleteProgram(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE program_id = :program_id';

            $stmt = $this->conn->prepare($query);

            $this->program_id = htmlspecialchars(strip_tags($this->program_id));

            $stmt->bindParam(':program_id',$this->program_id);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);

            return false;
        }
    }