<?php
require_once "class_db.php";

class pagination extends database{
    
    public $dataperpage;
    private $show_page;
    public $start;
    public $sql_all;
    public $sql_param;
    public $sql_order;
    public $sql_order_default;


    function __construct(){
        $this->dataperpage = 20;
        $this->show_page = 10;
    }
    
    /*function sqlquery($sql){
        return mysql_query($sql);
    }
    function fetchdata($sql){
        $res = array();
        if($hasil=$this->sqlquery($sql))
            while($data=mysql_fetch_array($hasil)){
                $res[] = $data;
            }
        return $res;
    }
   
    function jumrec($sql){ //jumlah hasil
        if($hasil=$this->sqlquery($sql))
            $jum=mysql_num_rows($hasil);
        else
            $jum=0;
        return $jum;
    }*/
    
    
    //============================ MAIN RENDER ============================
    function render(){
        if(!isset($_GET['order']))
            $this->sql_order = $this->sql_order_default;
        else
            $this->sql_order = $_GET['order'];
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            if($page<1)
                $page=1;
        }else{
            $page = 1;
        }
        //echo "<br>page=".$page;
        $i=0;
        $res_all=$this->sqlquery($this->sql_all);
        $jml_all=$this->jumrec($this->sql_all);
        $jml_page=ceil($jml_all/$this->dataperpage);
        if($page>$jml_page)
                $page=$page-1;
        //echo "<br>page=".$page;
        $this->start=($page-1)*$this->dataperpage;
        $next=$page+1;
        $prev=$page-1;
        
        if(isset($_GET['order']))
            $this->sql_param.= '&order='.$_GET['order'];
        
        echo "<div class='pagination'>";
            echo "<ul>";
                    $hal = floor($this->show_page/2);
                    $hal_start = $page-$hal;
                    if($hal_start<=0)
                        $hal_start = 1;
                    $hal_end = $hal_start+$this->show_page;
                    if($hal_end>$jml_page)
                        $hal_start = $jml_page-$this->show_page;
                    
                    echo "<li><a href='".$_SERVER['PHP_SELF']."?page=1&cari=cari".$this->sql_param."'>First</a></li>";
                    echo "<li><a href='".$_SERVER['PHP_SELF']."?page=$prev&cari=cari".$this->sql_param."'>Prev</a></li>";
                    for ($n=1;$n<=$jml_page;$n++){
                         if(($n>=$hal_start)&&($n<=$hal_end))
                        if($n == $page)
                                echo "<li class='active'><a href='".$_SERVER['PHP_SELF']."?page=$n&cari=cari".$this->sql_param."'>".$n."</a></li>";
                        else
                                echo "<li><a href='".$_SERVER['PHP_SELF']."?page=$n&cari=cari".$this->sql_param."'>".$n."</a></li>";
                    }
                    echo "<li><a href='".$_SERVER['PHP_SELF']."?page=$next&cari=cari".$this->sql_param."'>Next</a></li>";
                    echo "<li><a href='".$_SERVER['PHP_SELF']."?page=$jml_page&cari=cari".$this->sql_param."'>Last</a></li>";
            echo "</ul>";
        echo "</div>";
    }
    
}

?>
