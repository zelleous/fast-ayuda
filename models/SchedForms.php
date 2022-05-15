<?php   
    class SchedForms{
        private $conn;
        private $table = 'tblschedule';

        public $sched_id;

        public $name;
        public $location;
        public $start_date;
        public $end_date;
        public $sched_created;
        public $sched_updated;

        public function __construct($db){
            $this->conn=$db;
        }

        public function createSchedule(){
            $query = 'INSERT INTO ' . $this->table . '
                    SET
                        name = :name,
                        location = :location,
                        start_date = :start_date,
                        end_date = :end_date';

            $stmt = $this->conn->prepare($query);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->start_date = htmlspecialchars(strip_tags($this->start_date));
            $this->end_date = htmlspecialchars(strip_tags($this->end_date));
          
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':location',$this->location);
            $stmt->bindParam(':start_date',$this->start_date);
            $stmt->bindParam(':end_date',$this->end_date);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);
        }

        public function updateSchedule(){
            $query = 'UPDATE ' . $this->table . '
            SET
                name = :name,
                location = :location,
                start_date = :start_date,
                end_date = :end_date
            WHERE
                sched_id = :sched_id';

            $stmt = $this->conn->prepare($query);

            $this->sched_id = htmlspecialchars(strip_tags($this->sched_id));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->start_date = htmlspecialchars(strip_tags($this->start_date));
            $this->end_date = htmlspecialchars(strip_tags($this->end_date));
        
            $stmt->bindParam(':sched_id',$this->sched_id);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':location',$this->location);
            $stmt->bindParam(':start_date',$this->start_date);
            $stmt->bindParam(':end_date',$this->end_date);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);
        }

        public function readAllSchedule(){
                $query = 'SELECT
                    sched_id,
                    name,
                    location,
                    start_date,
                    end_date,
                    sched_updated,
                    sched_created

            FROM '. $this->table . '
            ORDER BY
                sched_created DESC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleSchedule(){
            $query = 'SELECT
                        sched_id,
                        name,
                        location,
                        start_date,
                        end_date,
                        sched_updated,
                        sched_created

                    FROM '. $this->table . '
                    WHERE 
                        sched_id = ? LIMIT 0,1';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->sched_id);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->sched_id = $row['sched_id'];
            $this->name = $row['name'];
            $this->location = $row['location'];
            $this->start_date = $row['start_date'];
            $this->end_date = $row['end_date'];
            $this->sched_updated = $row['sched_updated'];
            $this->sched_created = $row['sched_created'];
        }

        public function deleteSchedule(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE sched_id = :sched_id';

            $stmt = $this->conn->prepare($query);

            $this->sched_id = htmlspecialchars(strip_tags($this->sched_id));

            $stmt->bindParam(':sched_id',$this->sched_id);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);

            return false;
        }

        public function searchSchedule(){
            $query = 'SELECT 
                        location,
                        start_date,
                        end_date 
                    FROM ' . $this->table . ' 
                    WHERE
                        name = :name';

            $stmt = $this->conn->prepare($query);

            $this->name = htmlspecialchars(strip_tags($this->name));

            $stmt->bindParam(':name',$this->name);
            $stmt->execute();
			
			return $stmt;
            
        }

    }
