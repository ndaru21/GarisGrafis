<?php
    class Database{
        private static $Instance = null;
        private $connect,
                $host = 'localhost',
                $user = 'root',
                $password = '',
                $db_name = 'aplikasi_garis_grafis';

        public function __construct(){
            try{
                $this->connect = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die('Server Error Because '.$e->getMessage());
            }
        }
        
        public static function getInstance(){
            if(!isset(self::$Instance)){
                self::$Instance = new Database();
            }
            return self::$Instance;
        }

        public function insertData($table, $fields=array()){
            $column = implode(", ", array_keys($fields));
            $bungkusNilai = array();
            $i = 0;

            foreach($fields as $nama_kolom => $nilai){
                if(!is_int($nilai)){
                    $bungkusNilai[] = "'".$nilai."'";
                }else{
                    $bungkusNilai[] = $nilai;
                }
                $i++;
            }

            $result = implode(", ", $bungkusNilai);

            $statement = $this->connect->prepare("INSERT INTO $table($column) VALUES($result)");
            // print_r($statement); die();
            $statement->execute();
        }
    }
?>