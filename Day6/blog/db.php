<?php 
// class DBController {
//     //koneksi database
//     protected $host = 'localhost';
//     protected $user = 'root';
//     protected $password = '';
//     protected $database = 'bootcampbflp_blog';

//     //connection
//     public $con = null;

//     //construtor
//     public function __construct(){
//         $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
//         if($this->con->connect_error){
//             echo "Fail".$this->con->connect_error;
//         }
//     }

//     public function __destruct(){
//         $this->closeConnection();
//     }

//     protected function closeConnection(){
//         if($this->con != null){
//             $this->con->close();
//             $this->con = null;
//         }
//     }

// }
$db = mysqli_connect("localhost", "root", "", "bootcampbflp_blog");
?>