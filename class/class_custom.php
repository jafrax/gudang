<?php
class custom
{
	function konversi_tanggal_english($tanggal){ // 04 March 1978
		$year=substr($tanggal,0,4);
		$bln=substr($tanggal,5,2);
		$day=substr($tanggal,8,2);
		switch($bln){
			case "01":$month="January";break;
			case "02":$month="February";break;
			case "03":$month="March";break;
			case "04":$month="April";break;
			case "05":$month="May";break;
			case "06":$month="June";break;
			case "07":$month="July";break;
			case "08":$month="August";break;
			case "09":$month="September";break;
			case "10":$month="October";break;
			case "11":$month="November";break;
			case "12":$month="December";break;
		}
		if($day=="01"){
			$day="1st";
		}
		else if($day=="02"){
			$day="2nd";
		}
		else if($day=="03"){
			$day="3rd";
		}
		else{
			$day=$day."th";
		}
		$ubah="$month, $day $year";
		return $ubah;
	}
	
	function konversi_tanggal_indo($tanggal){ //04 Maret 1978
		$year=substr($tanggal,0,4);
		$bln=substr($tanggal,5,2);
		$day=substr($tanggal,8,2);
		switch($bln){
			case "01":$month="Januari";break;
			case "02":$month="Februari";break;
			case "03":$month="Maret";break;
			case "04":$month="April";break;
			case "05":$month="Mei";break;
			case "06":$month="Juni";break;
			case "07":$month="Juli";break;
			case "08":$month="Agustus";break;
			case "09":$month="September";break;
			case "10":$month="Oktober";break;
			case "11":$month="Nopember";break;
			case "12":$month="Desember";break;
		}
		$ubah="$day $month $year";
		return $ubah;
	}
	
	function konversi_tanggal_indo_short($tanggal){ //04 Mar 1978
		$year=substr($tanggal,0,4);
		$bln=substr($tanggal,5,2);
		$day=substr($tanggal,8,2);
		switch($bln){
			case "01":$month="Jan";break;
			case "02":$month="Feb";break;
			case "03":$month="Mar";break;
			case "04":$month="Apr";break;
			case "05":$month="Mei";break;
			case "06":$month="Jun";break;
			case "07":$month="Jul";break;
			case "08":$month="Agt";break;
			case "09":$month="Sep";break;
			case "10":$month="Okt";break;
			case "11":$month="Nop";break;
			case "12":$month="Des";break;
		}
		$ubah="$day $month $year";
		return $ubah;
	}
	
	function tanggal_angka_indo_minus($tanggal){ //04-03-1978
		$thn=substr($tanggal,0,4);
		$bln=substr($tanggal,5,2);
		$tgl=substr($tanggal,8,2);
		$tgl_skr="$tgl-$bln-$thn";
		return $tgl_skr;
	}
	
	function tanggal_angka_indo_garing($tanggal){ //04/03/1978
		$thn=substr($tanggal,0,4);
		$bln=substr($tanggal,5,2);
		$tgl=substr($tanggal,8,2);
		$tgl_skr="$tgl/$bln/$thn";
		return $tgl_skr;
	}
		
	function hari_indo($day){
		switch($day){
			case "Sun":$hari="Minggu";break;
			case "Mon":$hari="Senin";break;
			case "Tue":$hari="Selasa";break;
			case "Wed":$hari="Rabu";break;
			case "Thu":$hari="Kamis";break;
			case "Fri":$hari="Jumat";break;
			case "Sat":$hari="Sabtu";break;
		}
		return $hari;
	}
	
	function konversi_tanggal_english_short($tanggal_indo){ //04-03-1978 ---> 1978-03-04
		$year=substr($tanggal_indo,6,4);
		$mnt=substr($tanggal_indo,3,2);
		$day=substr($tanggal_indo,0,2);
		$date_english = "$year-$mnt-$day";
		return $date_english;
	}
		
	function tulis_uang($input){
		$panjang=strlen($input);
		switch($panjang){
			case 1:	$satuan=substr($input,0,1);
					$str_uang=$satuan;
					break;
			case 2:	$puluhan=substr($input,0,2);
					$str_uang=$puluhan;
					break;
			case 3:	$ratusan=substr($input,0,3);
					$str_uang=$ratusan;
					break;
			case 4:	$ribuan=substr($input,0,1);$ratusan=substr($input,1,3);
					$str_uang=$ribuan.".".$ratusan;
					break;
			case 5:	$ribuan=substr($input,0,2);$ratusan=substr($input,2,3);
					$str_uang=$ribuan.".".$ratusan;
					break;
			case 6:	$ribuan=substr($input,0,3);$ratusan=substr($input,3,3);
					$str_uang=$ribuan.".".$ratusan;
					break;
			case 7:	$jutaan=substr($input,0,1);$ribuan=substr($input,1,3);$ratusan=substr($input,4,3);
					$str_uang=$jutaan.".".$ribuan.".".$ratusan;
					break;
			case 8:	$jutaan=substr($input,0,2);$ribuan=substr($input,2,3);$ratusan=substr($input,5,3);
					$str_uang=$jutaan.".".$ribuan.".".$ratusan;
					break;
			case 9:	$jutaan=substr($input,0,3);$ribuan=substr($input,3,3);$ratusan=substr($input,6,3);
					$str_uang=$jutaan.".".$ribuan.".".$ratusan;
					break;
			case 10:$milyar=substr($input,0,1);$jutaan=substr($input,1,3);$ribuan=substr($input,4,3);$ratusan=substr($input,7,3);
					$str_uang=$milyar.".".$jutaan.".".$ribuan.".".$ratusan;
					break;
			case 11:$milyar=substr($input,0,2);$jutaan=substr($input,2,3);$ribuan=substr($input,5,3);$ratusan=substr($input,8,3);
					$str_uang=$milyar.".".$jutaan.".".$ribuan.".".$ratusan;
					break;
			case 12:$milyar=substr($input,0,3);$jutaan=substr($input,3,3);$ribuan=substr($input,6,3);$ratusan=substr($input,9,3);
					$str_uang=$milyar.".".$jutaan.".".$ribuan.".".$ratusan;
					break;
			case 13:$trilyun=substr($input,0,1);$milyar=substr($input,1,3);$jutaan=substr($input,4,3);$ribuan=substr($input,7,3);$ratusan=substr($input,10,3);
					$str_uang=$trilyun.".".$milyar.".".$jutaan.".".$ribuan.".".$ratusan;
					break;
			case 14:$trilyun=substr($input,0,2);$milyar=substr($input,2,3);$jutaan=substr($input,5,3);$ribuan=substr($input,8,3);$ratusan=substr($input,11,3);
					$str_uang=$trilyun.".".$milyar.".".$jutaan.".".$ribuan.".".$ratusan;
					break;
					
					
		}
		return $str_uang;
	}
	
	function rand_bg(){
		$warna=rand(0,11); 
		$cl=array('#D2FCFF','#C1FFC1','#FFEC9F','#FFD9FF','#FFCEAE','#FFD2D2','#D8D8EB','#FFE0C1','#FFFFC6','#FFFFFF','#FFFFA6','#C1FFFF');
		$clr=$cl[$warna];
		return $clr;
	}
	
	function rand_bg_pics(){
		$pics_bg=rand(0,14); 
		$bg=array('dinamic_bg_01.gif','dinamic_bg_02.gif','dinamic_bg_03.gif','dinamic_bg_04.gif','dinamic_bg_05.gif','dinamic_bg_06.gif','dinamic_bg_07.gif','dinamic_bg_08.gif','dinamic_bg_09.gif','dinamic_bg_10.gif','dinamic_bg_11.gif','dinamic_bg_12.gif','dinamic_bg_13.gif','dinamic_bg_14.gif','dinamic_bg_15.gif');
		$background=$bg[$pics_bg];
		return $background;
	}
	
	function terbilang($input){
                $terbilang_trilyun = '';
                $terbilang_milyar = '';
                $terbilang_juta = '';
                $terbilang_ribu = '';
                $terbilang_ratus = '';
            
		$length = strlen($input);
		$p = $length / 3;
                $loop = ceil($p) - 1;   
		
		$tulis_input = $this->tulis_uang($input);
		$exp_input = explode(".",$tulis_input);
		$arr_satuan = array (1=>'Satu',2=>'Dua',3=>'Tiga',4=>'Empat',5=>'Lima',6=>'Enam',7=>'Tujuh',8=>'Delapan',9=>'Sembilan');
		$arr_puluhan = array (1=>'Sepuluh',2=>'Dua Puluh',3=>'Tiga Puluh',4=>'Empat Puluh',5=>'Lima Puluh',6=>'Enam Puluh',7=>'Tujuh Puluh',8=>'Delapan Puluh',9=>'Sembilan Puluh');
		$arr_belasan = array (11=>'Sebelas',12=>'Dua Belas',13=>'Tiga Belas',14=>'Empat Belas',15=>'Lima Belas',16=>'Enam Belas',17=>'Tujuh Belas',18=>'Delapan Belas',19=>'Sembilan Belas');
		$arr_ratusan = array(1=>'Seratus',2=>'Dua Ratus',3=>'Tiga Ratus',4=>'Empat Ratus',5=>'Lima Ratus',6=>'Enam Ratus',7=>'Tujuh Ratus',8=>'Delapan Ratus',9=>'Sembilan Ratus');
		$arr_ribuan = array(1=>'Seribu');
		
		$i = $loop;
		if($i>=0){
			$ratus = $exp_input[$i]; 
			$ln = strlen($ratus);
			$ln--;
			if($ln >= 0){ 
				 $sat_rt = substr($ratus,$ln,1); $ln--; 
			}
			if($ln >= 0){ 
				 $pul_rt = substr($ratus,$ln,1);  
				 if($pul_rt == '1') 
				 	$bls_rt = substr($ratus,$ln,2); 
				$ln--;  
			}
			if($ln >= 0){ 
				 $rat_rt = substr($ratus,$ln,1); $ln--; 
			}
			if(($pul_rt == '1') && ($sat_rt != "0"))
				$terbilang_ratus = $arr_ratusan[$rat_rt]." ".$arr_belasan[$bls_rt];
			else
				$terbilang_ratus = $arr_ratusan[$rat_rt]." ".$arr_puluhan[$pul_rt]." ".$arr_satuan[$sat_rt];
		}
		$i--;
		if($i>=0){
			$ribu = $exp_input[$i];
			$ln = strlen($ribu);
			$ln--;
			if($ln >= 0){ 
				 $sat_r = substr($ribu,$ln,1); $ln--; 
			}
			if($ln >= 0){ 
				 $pul_r = substr($ribu,$ln,1);  if($pul_r == '1') $bls_r = substr($ribu,$ln,2); $ln--;  
			}
			if($ln >= 0){ 
				 $rat_r = substr($ribu,$ln,1); $ln--; 
			}
			if(($pul_r == "1") && ($sat_r != "0"))
				$terbilang_ribu= $arr_ratusan[$rat_r]." ".$arr_belasan[$bls_r]." Ribu ";
			else
				$terbilang_ribu = $arr_ratusan[$rat_r]." ".$arr_puluhan[$pul_r]." ".$arr_satuan[$sat_r]." Ribu ";
			if(($sat_r == "1")&&($pul_r == "")&&($rat_r == ""))
				$terbilang_ribu = " Seribu ";
		}
		$i--;
		if($i>=0){
			$juta = $exp_input[$i];
			$ln = strlen($juta);
			$ln--;
			if($ln >= 0){ 
				 $sat_j = substr($juta,$ln,1); $ln--; 
			}
			if($ln >= 0){ 
				 $pul_j = substr($juta,$ln,1);  if($pul_j == '1') $bls_j = substr($juta,$ln,2);	 $ln--;  
			}
			if($ln >= 0){ 
				 $rat_j = substr($juta,$ln,1); $ln--; 
			}
			if(($pul_j == "1") && ($sat_j != "0"))
				$terbilang_juta= $arr_ratusan[$rat_j]." ".$arr_belasan[$bls_j]." Juta ";
			else
				$terbilang_juta = $arr_ratusan[$rat_j]." ".$arr_puluhan[$pul_j]." ".$arr_satuan[$sat_j]." Juta ";
		}
		$i--;
		if($i>=0){
			$milyar = $exp_input[$i];
			$ln = strlen($milyar);
			$ln--;
			if($ln >= 0){ 
				 $sat_m = substr($milyar,$ln,1); $ln--; 
			}
			if($ln >= 0){ 
				 $pul_m = substr($milyar,$ln,1);  if($pul_m == '1') $bls_m = substr($milyar,$ln,2); $ln--;  
			}
			if($ln >= 0){ 
				 $rat_m = substr($milyar,$ln,1); $ln--; 
			}
			if(($pul_m == "1") && ($sat_m != "0"))
				$terbilang_milyar= $arr_ratusan[$rat_m]." ".$arr_belasan[$bls_m]." Milyar ";
			else
				$terbilang_milyar = $arr_ratusan[$rat_m]." ".$arr_puluhan[$pul_m]." ".$arr_satuan[$sat_m]." Milyar ";
		}
		$i--;
		if($i>=0){
			$trilyun = $exp_input[$i];
			$ln = strlen($trilyun);
			$ln--;
			if($ln >= 0){ 
				 $sat_t = substr($trilyun,$ln,1); $ln--; 
			}
			if($ln >= 0){ 
				 $pul_t = substr($trilyun,$ln,1);  if($pul_t == '1') $bls_m = substr($trilyun,$ln,2); $ln--;  
			}
			if($ln >= 0){ 
				 $rat_t = substr($trilyun,$ln,1); $ln--; 
			}
			if(($pul_t == "1") && ($sat_t != "0"))
				$terbilang_trilyun= $arr_ratusan[$rat_t]." ".$arr_belasan[$bls_t]." Trilyun ";
			else
				$terbilang_trilyun = $arr_ratusan[$rat_t]." ".$arr_puluhan[$pul_t]." ".$arr_satuan[$sat_t]." Trilyun ";
		}				
		//return $pul_j.$terbilang_trilyun.$terbilang_milyar.$terbilang_juta.$terbilang_ribu.$terbilang_ratus." Rupiah";
                return $terbilang_trilyun.$terbilang_milyar.$terbilang_juta.$terbilang_ribu.$terbilang_ratus." Rupiah";
	}
	
	function currency($str,$dec){
		$curr = number_format($str,$dec,',','.');
		return $curr;
	}
	
	
	
	function make_id () { 
		$string = '';
		for ($i = 1; $i <= 3; $i++)
			$string.= rand(0,9);
		$date_time = date('ymdHis');
		$id = $date_time.$string;
		return $id; 
	}
	
	function make_no_doc($nama_doc){
		$sql_no_doc = "SELECT value,tabel_relasi FROM setup_variable WHERE jenis='no_doc' AND variable='$nama_doc'";
		$dat_no_doc = $this->datasql($sql_no_doc);
		$thn_now = date('y');
		$bln_now = date('m');
		$sql_no = "SELECT MAX(urut) FROM $dat_no_doc[1]";
		$res_no = $this->sqlquery($sql_no);
		$jml_no = $this->jumrec($sql_no);
		if($jml_no >0 ){
			while ($dat_no = mysql_fetch_row($res_no))
				$urut_akhir = $dat_no[0]+1;
		} 
		else {
			$urut_akhir = 1;
		}
		if ($urut_akhir < 10)
			$urut_akhir = "0".$urut_akhir;
		if ($urut_akhir < 100)
			$urut_akhir = '0'.$urut_akhir;
		if ($urut_akhir < 1000)
			$urut_akhir = '0'.$urut_akhir;
		if ($urut_akhir < 10000)
			$urut_akhir = '0'.$urut_akhir;
		if ($urut_akhir < 100000)
			$urut_akhir = '0'.$urut_akhir;
		if ($urut_akhir < 1000000)
			$urut_akhir = '0'.$urut_akhir;


		//$no_doc = $urut_akhir.'/'.$bln_now.'/'.$thn_now;
		$kode_cab = $this->kode_cabang();
		//$no_doc = $dat_no_doc[0].'/'.$kode_cab.'/'.$urut_akhir.'/'.$bln_now.'/'.$thn_now;
		$no_doc = $dat_no_doc[0].'/'.$kode_cab.'/'.$thn_now.$bln_now.$urut_akhir;
		return $no_doc;
	}
	
        
        
	function err_alert($err){
		print("
		<script languange='javascript'>
			alert('$err ERROR');
		</script>
		");
	}
	
	
	
	function proses_fail($ket){
		include "header.php";
		//echo "<span align='center'><a href='#' onclick='history.go(-1)'>BACK</a></span><br><br>";
		die("<span align='center'><h2>$ket FAIL !<br><br>Catat keterangan diatas<br>Kemudian tutup SIAPP<br>Segera hubungi Teguh Andriyanto <br>HP: 0858 5133 2783</h2></span>");
	}
	
	function cek_priv($menu_id){
		if(($_SESSION['menu_'.$menu_id]==0)&&($_SESSION['ses_username'] != 'admin'))
			die("<h3>You don't have priviledge to access this page !</h3>");
		else
			return $_SESSION['menu_'.$menu_id];
	}
	
	function cek_maintenance(){
		$sql_mtn = "SELECT * FROM setup_variable WHERE variable='maintenance'";
		$dat_mtn = $this->datasql($sql_mtn);
		if(($dat_mtn[value]=='1')&&($_SESSION['ses_username'] != 'admin'))
			die("
				Maaf ".$_SESSION['ses_username']."<br>
				IVORY Sedang Dalam Maintenance<br>
				Silahkan Tutup Aplikasi Ini Dan Ulangi Beberapa Saat Lagi<br><br>
				Thx<br>
				Tguh<br>
				[:-)> 
				");	
	}
	
	function level_menu($menu_id){
                $lvl = array();
		if(isset($_SESSION['level_'.$menu_id])){
                    $level = $_SESSION['level_'.$menu_id];
                    $lvl['C'] = substr($level,0,1);
                    $lvl['R'] = substr($level,1,1);
                    $lvl['U'] = substr($level,2,1);
                    $lvl['D'] = substr($level,3,1);
                }
		return $lvl;
	}
	
	function create_top_button($lvl,$name){
        // Edited by Hori
        echo "<div class=\"btn-group\">";
        $level = $this->level_menu($lvl);   
        if((isset($level['C'])&&($level['C']=='1'))||($_SESSION['username']=='admin')){
            echo "<a class='btn btn-small' href='".$name."_add.php'><i class='icon-plus-sign'></i> TAMBAH</a>&nbsp;";
		}
		if((isset($level['R'])&&($level['R']=='1'))||($_SESSION['username']=='admin')){
	        echo "<a class='btn btn-small' href='".$name.".php'><i class='icon-list-alt'></i> LIHAT</a>";
        }
        echo "</div>";
                
                /*echo "<div class=\"btn-group\">";
		$level = $this->level_menu($lvl);   
                if((isset($level['C'])&&($level['C']=='1'))||($_SESSION['username']=='admin')){
                        echo "<a class='btn' href='".$name."_add.php'><i class='icon-plus-sign'></i> TAMBAH</a>";
		}
		if((isset($level['R'])&&($level['R']=='1'))||($_SESSION['username']=='admin')){
		        echo "<a class='btn' href='".$name.".php'>&nbsp;&nbsp;&nbsp;<i class='icon-list-alt'></i> LIHAT&nbsp;&nbsp;&nbsp;</a>";
                }
                echo "</div>";*/
	}       
        
        function create_save_add_button($page_id,$attr=array('value'=>'SIMPAN')){
            $level = $this->level_menu($page_id);                
            if((isset($level['C'])&&($level['C']=='1'))||($_SESSION['username']==$_SESSION['username'])){
                    echo "<input type='hidden' name='act' value='add'>";
                    echo "<input type='submit' name='submit' id='submit' value='".$attr['value']."' class='btn btn-inverse btn-large'>";                   
            }
        }
        
        function create_save_button($lvl,$attr=array('value'=>'SIMPAN')){
            $level = $this->level_menu($lvl);                
            if((isset($level['U'])&&($level['U']=='1'))||($_SESSION['username']==$_SESSION['username'])){
                    echo "<input type='hidden' name='act' value='edit'>";
                    echo "<input type='submit' name='submit' id='Simpan' value='".$attr['value']."' class='btn btn-inverse btn-large'>";                 
            }
        }
        
        function create_delete_button($lvl,$attr=array('value'=>'HAPUS')){
            $level = $this->level_menu($lvl);                
            if((isset($level['D'])&&($level['D']=='1'))||($_SESSION['username']==$_SESSION['username'])){
                    echo "<input type='hidden' name='act' value='delete'>";
                    echo "<input type='submit' name='submit' id='submit' value='".$attr['value']."' class='btn'>";                
            }
        }
        
        function create_back_button($page_id=NULL,$attr=array('value'=>'KEMBALI')){
            echo "<input type='button' name='Back' id='Back' value='".$attr['value']."' class='btn btn-large' onclick='history.go(-1)'>";
        }
        
        function selisih_hari($tgl_1, $tgl_2){ //format input yyyy-mm-dd
            $pecah_1 = explode("-", $tgl_1);
            $date_1 = (int) $pecah_1[2];
            $month_1 = (int) $pecah_1[1];
            $year_1 = (int) $pecah_1[0];
            $pecah_2 = explode("-", $tgl_2);
            $date_2 = (int) $pecah_2[2];
            $month_2 = (int) $pecah_2[1];
            $year_2 = (int) $pecah_2[0];
            $jd_1 = GregorianToJD($month_1, $date_1, $year_1);
            $jd_2 = GregorianToJD($month_2, $date_2, $year_2);
            $selisih = $jd_2 - $jd_1;
            return $selisih;
        }
	
	function cek_direct_access(){
		if(($_SERVER['HTTP_REFERER']=='')||(!isset($_SESSION['ses_username']))||($_SESSION['ses_username']!='admin'))
			die('Direct access not allowed');
	}
	
	function log($log){
            $arr_log = explode(' | ',$log);
            $user = $arr_log[0];
            $arr_date_time = explode(' ',$arr_log[1]);
            $tgl = $arr_date_time[0];
            $tgl = $this->tanggal_angka_indo_garing($tgl);
            $waktu = $arr_date_time[1];
            $res = $user.' '.$tgl.' '.$waktu;
            return $res;
        }
        
        function konversi_jml_sat($item_id,$jml){
		$sql = "SELECT * FROM item WHERE id='$item_id'";
		$dat = $this->datasql($sql);
		$sat1 = $dat['satuan_id_1'];
		$sat2 = $dat['satuan_id_2'];
		$sat3 = $dat['satuan_id_3'];
		$conv2 = $dat['conv_2'];
		$conv3 = $dat['conv_3'];
		$jml_sat = "";
		if(($sat2!=' ')&&($jml>0)){
			$tmp3 = $jml / $conv3;
			$jml_sat3 = floor($tmp3);
			$sisa3 = $jml % $conv3;
			$jml = $sisa3;
			$jml_sat3 = $this->currency($jml_sat3,0);
			if($jml_sat3 > 0){
				if($jml==0)
					$jml_sat.= "$jml_sat3 $sat3";
				else
					$jml_sat.= "$jml_sat3 $sat3, ";
			}
		}
		if(($sat2!=' ')&&($jml>0)){
			$tmp2 = $jml / $conv2;
			$jml_sat2 = floor($tmp2);
			$sisa2 = $jml % $conv2;
			$jml = $sisa2;
			$jml_sat2 = $this->currency($jml_sat2,0);
			if($jml_sat2 > 0){
				if($jml==0)
					$jml_sat.= "$jml_sat2 $sat2";
				else
					$jml_sat.= "$jml_sat2 $sat2, ";
			}
		}
		if(($sat1!=' ')&&($jml>0)){
			$jml = $this->currency($jml,0);
			$jml_sat.= "$jml $sat1";
		}
		return $jml_sat;
		
	}
	
	
    
    function notif_warning($msg,$dest){
        $_SESSION['warning'] = $msg;
        header("Location: $dest");
        exit();
    }
    
    function notif_success($msg,$dest){
        $_SESSION['notif'] = $msg;
        header("Location: $dest");
        exit();
    }
}
?>
