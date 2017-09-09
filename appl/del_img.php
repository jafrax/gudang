<?php 
  include '../script_awal.php';
  // include $doc_root.'bs_meta.php';   
  // include $doc_root.'bs_css.php';
  require_once "../class/config_mssql.php";
  $mssql = new pdo_dblib_mssql();
  $id = $_GET['id'];
  $link = "/var/www/html/produk_image/".$id;
  
 if(!empty($id)){


                         $query = "DELETE FROM dbo.imagebarang WHERE image = '$id' ";
                                  $statement = $mssql->db->prepare($query);
                                  $statement->execute();
                                  // var_dump($statement);

                              unlink($link);

                              $_SESSION['notif'] = 'DEL Berhasil';
       
  						print" <script>history.back(-1);</script>";


 }
 ?>
