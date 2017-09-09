<?php
//require 'class_db.php';

class no_document extends database {
        
        function __construct(){            
        }
        
	function make_id () { 
		$string = '';
		for ($i = 1; $i <= 3; $i++)
			$string.= rand(0,9);
		$date_time = date('ymdHis');
		$id = $date_time.$string;
		return $id; 
	}
	
        function make_id_urut($table_name,$digit){
            $sql = "SELECT MAX(id) as id FROM $table_name ORDER BY id";
            $dat = $this->datasql($sql);
            if($dat['id']=='')
                    $dat['id'] = 0;
            $count = (int) $dat['id'];
            $count++;
            while(strlen($count)<$digit){
                $count = '0'.$count;
            }
            return $count;
            
        }
        
	function make_no_doc($cab,$nama_doc){
		$sql_no_doc = "SELECT value,tabel_relasi,thn,bln,tgl,no_urut 
                                FROM setup_variable 
                                WHERE jenis='no_doc' AND variable='$nama_doc' 
                                AND cabang_id='$cab'";
		$dat_no_doc = $this->datasql($sql_no_doc);
                /*    echo $dat_no_doc['value'];
                else
                    echo "Query Fail";*/
                
		$date_now = date('Y-m-d');
                $thn_now = (int) date('Y');
                $bln_now = (int) date('m');
                $tgl_now = (int) date('d');
                $thn_no_doc = (int) $dat_no_doc['thn'];
                $bln_no_doc = (int) $dat_no_doc['bln'];
                $tgl_no_doc = (int) $dat_no_doc['tgl'];
                
                //Cek reset no urut
                if($thn_no_doc != $thn_now){
                    $sql_upd = "UPDATE setup_variable 
                                SET thn=$thn_now, no_urut=0 
                                WHERE jenis='no_doc' AND variable='$nama_doc' AND cabang_id='$cab'";
                    if(!$res_upd = $this->sqlquery($sql_upd))
                        die($sql_upd);
                    $sql_no_doc = "SELECT value,tabel_relasi,thn,bln,tgl,no_urut 
                                    FROM setup_variable 
                                    WHERE jenis='no_doc' AND variable='$nama_doc' AND cabang_id='$cab'";
                    $dat_no_doc = $this->datasql($sql_no_doc);
                }
                
		$count = $dat_no_doc['no_urut']+1;
                
                $sql_upd = "UPDATE setup_variable SET no_urut=".$count." 
                            WHERE jenis='no_doc' AND variable='$nama_doc' AND cabang_id='$cab'";
                if(!$res_upd = $this->sqlquery($sql_upd))
                    die($sql_upd);

		/*if ($count < 10)
			$count = "0".$count;
		if ($count < 100)
			$count = '0'.$count;
		if ($count < 1000)
			$count = '0'.$count;
		if ($count < 10000)
			$count = '0'.$count;
		if ($count < 100000)
			$count = '0'.$count;
		if ($count < 1000000)
			$count = '0'.$count;*/
                
                while(strlen($count)<7){
                    $count = '0'.$count;
                }


		$tgl = date('ym');
		$kode_cab = $cab;
		$no_doc = $dat_no_doc['value'].'/'.$kode_cab.'/'.$tgl.$count;
		return $no_doc;
	}
	
}
?>
