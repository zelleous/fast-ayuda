<?php
    class TransForms{
        private $conn;
        private $table = 'tbltrans';

        public $transaction_id;
        //personal information
        public $beneficiary;
        public $service;
        public $date;
        public $time;
        public $status;
        public $ref_number;
        public $trans_created;
        public $trans_updated;
        
        
        public function __construct($db){
            $this->conn=$db;
        }

        public function createTransaction(){
            $query = 'INSERT INTO ' . $this->table . '
                    SET
                        beneficiary = :beneficiary,
                        service = :service,
                        date = :date,
                        location = :location,
                        time = :time,
                        status = :status,
                        ref_number =: ref_number,
                        trans_created = :trans_created';
            
            $stmt = $this->conn->prepare($query);

            $this->beneficiary = htmlspecialchars(strip_tags($this->beneficiary));
            $this->service = htmlspecialchars(strip_tags($this->service));
            $this->date = htmlspecialchars(strip_tags($this->date));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->time = htmlspecialchars(strip_tags($this->time));
            $this->status = htmlspecialchars(strip_tags($this->status));
            $this->ref_number = htmlspecialchars(strip_tags($this->ref_number));
          
            $stmt->bindParam('beneficiary',$this->beneficiary);
            $stmt->bindParam('service',$this->service);
            $stmt->bindParam('date',$this->date);
            $stmt->bindParam('location',$this->location);
            $stmt->bindParam('time',$this->time);
            $stmt->bindParam('status',$this->status);
            $stmt->bindParam('ref_number',$this->ref_number);

            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);
        }

        public function updateTransaction(){
            $query = 'UPDATE ' . $this->table . '
                    SET
                    beneficiary = :beneficiary,
                    service = :service,
                    date = :date,
                    location = :location,
                    time = :time,
                    status = :status,
                    ref_number = :ref_number,
                    trans_updated = :trans_updated
                    WHERE
                        transaction_id = :transaction_id';

            $stmt = $this->conn->prepare($query);

            $this->beneficiary = htmlspecialchars(strip_tags($this->beneficiary));
            $this->service = htmlspecialchars(strip_tags($this->service));
            $this->date = htmlspecialchars(strip_tags($this->date));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->time = htmlspecialchars(strip_tags($this->time));
            $this->status = htmlspecialchars(strip_tags($this->status));
            $this->ref_number = htmlspecialchars(strip_tags($this->ref_number));
          
            $stmt->bindParam('beneficiary',$this->beneficiary);
            $stmt->bindParam('service',$this->service);
            $stmt->bindParam('date',$this->date);
            $stmt->bindParam('location',$this->location);
            $stmt->bindParam('time',$this->time);
            $stmt->bindParam('status',$this->status);
            $stmt->bindParam('ref_number',$this->ref_number);


            if($stmt->execute()){
                return true;
            }

            printf("ERROR: %s \n" . $stmt->error);
        }

        public function readAllTrans(){
                $query = 'SELECT
                beneficiary,
                service,
                date,
                location,
                time,
                ref_number,
                trans_created,
                trans_updated
            FROM '. $this->table . '
            ORDER BY
                trans_created DESC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function readSingleUser(){
            $query = 'SELECT
                        beneficiary,
                        service,
                        date,
                        location,
                        time,
                        ref_number,
                        trans_created,
                        trans_updated`

                    FROM '. $this->table . '
                    WHERE 
                        transaction_id = :transaction_id';

            $stmt = $this->conn->prepare($query);

            $this->transaction_id = htmlspecialchars(strip_tags($this->transaction_id));

            $stmt->bindParam(':transaction_id , $this->transaction_id ');

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->transaction_id = $row['transaction_id'];
            $this->beneficiary = $row['beneficiary'];
            $this->service = $row['service'];
            $this->date = $row['date'];
            $this->location = $row['location'];
            $this->time = $row['time'];
            $this->status = $row['status'];
            $this->ref_number = $row['ref_number'];

            return $stmt;
        }
    }