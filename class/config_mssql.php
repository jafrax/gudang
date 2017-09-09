<?php
/**
*    @author     Johan Kasselman <johankasselman@live.com>
*    @since         2015-09-28    V1
*
*/

// ini_set('display_errors', 1);
//Atau
// error_reporting(E_ALL && ~E_NOTICE);

class pdo_dblib_mssql{

    public $db;
    public $cTransID;
    public $childTrans = array();

    // public function __construct($hostname, $port, $dbname, $username, $pwd){
    public function __construct(){

        $this->hostname = 'suryapersada.com';
        $this->port = 1433;
        $this->dbname = 'cps';
        $this->username = 'sa';
        $this->pwd = 'NewLife';

        $this->connect();
       
    }

    public function beginTransaction(){

        $cAlphanum = "AaBbCc0Dd1EeF2fG3gH4hI5iJ6jK7kLlM8mN9nOoPpQqRrSsTtUuVvWwXxYyZz";
        $this->cTransID = "T".substr(str_shuffle($cAlphanum), 0, 7);

        array_unshift($this->childTrans, $this->cTransID);

        $stmt = $this->db->prepare("BEGIN TRAN [$this->cTransID];");
        return $stmt->execute();

    }

    public function rollBack(){
       
        while(count($this->childTrans) > 0){
            $cTmp = array_shift($this->childTrans);
            $stmt = $this->db->prepare("ROLLBACK TRAN [$cTmp];");
            $stmt->execute();
        }

        return $stmt;
    }

    public function commit(){

        while(count($this->childTrans) > 0){
            $cTmp = array_shift($this->childTrans);
            $stmt = $this->db->prepare("COMMIT TRAN [$cTmp];");
            $stmt->execute();
        }

        return  $stmt;
    }

    public function close(){
        $this->db = null;
    }

    public function connect(){

        try {
            $this->db = new PDO ("dblib:host=$this->hostname:$this->port;dbname=$this->dbname", "$this->username", "$this->pwd");

          

        } catch (PDOException $e) {
            $this->logsys .= "Failed to get DB handle: " . $e->getMessage() . "\n";
        }

        // var_dump("sukses");

    }

}

?>
