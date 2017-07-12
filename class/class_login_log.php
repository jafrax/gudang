<?php
require_once "class_db.php";

class login_log extends database{
    
    function __construct(){
    }
    
    function create_log($status,$menu_id,$menu_nama=NULL,$tabel_relasi=NULL,$id_relasi=NULL){
        $sql_login = "SELECT id FROM login_usr WHERE username='".$_SESSION['username']."'";
        $dat_login = $this->datasql($sql_login);
        $usr = $dat_login['id'];
        
        $sql_menu = "SELECT nama FROM menu WHERE id='$menu_id'";
        if($this->jumrec($sql_menu)>0){
            $dat_menu = $this->datasql($sql_menu);
            $menu_nama = $dat_menu['nama'];
        }
        if($menu_id!='')
            $sql = "INSERT INTO login_log 
                    (login_usr_id,menu_id,menu_nama,status,tabel_relasi,id_relasi) VALUES 
                    ('$usr','$menu_id','$menu_nama','$status','$tabel_relasi','$id_relasi')";
        else
            $sql = "INSERT INTO login_log 
                    (login_usr_id,menu_nama,status,tabel_relasi,id_relasi) VALUES 
                    ('$usr','$menu_nama','$status','$tabel_relasi','$id_relasi')";
        //die($sql);
        $this->sqlquery($sql);
    }
    
}

?>
