
<!DOCTYPE html>
<html lang="en">
   <head>
  <?php 
  include '../script_awal.php';
  include $doc_root.'bs_meta.php';   
  include $doc_root.'bs_css.php';
  require_once "../class/config_mssql.php";
  $mssql = new pdo_dblib_mssql();
  ?>
  <link href="../asset/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../asset/css/menu_nav.css" rel="stylesheet" type="text/css">
  </head>
 <body>
    <?php include $doc_root.'header.php';?>
    <?php include $doc_root.'menu_top.php';?>  
     <div class="container-fluid">

        <!-- START JUDUL, TOMBOL & FORM CARI -->
         <div class="row-fluid">
            <div class="span12">
              <legend>
                  <?php  //$cst->create_top_button($page_id,$page_name);?>
                  GUDANG BARANG
                  <!--
                  <form name="search_form" act="<?php //echo $_SERVER['PHP_SELF'];?>" method="GET" class="pull-right">
                    <input type="text" name="nama" id="nama" value='<?php //if(isset($_GET['cari'])) echo $nama;?>' class="input-medium search-query" placeholder="Nama">
                    <input type="Submit" name="cari" id="cari" value="CARI" class="btn">
                  </form> -->
              </legend>
            </div>
         </div>
         <!-- START JUDUL, TOMBOL & FORM CARI -->
    

          <!-- START PAGINATION & PESAN NOTIFIKASI -->
         <div class="row-fluid">
           <div class="span7" style="margin-top: 5px;"><?php include $doc_root.'msg.php';?></div>
         </div>
         <!-- END PAGINATION & PESAN NOTIFIKASI -->
             
         <!-- START TABEL DATA -->
         <div class="row-fluid">
             <div class="span12">     
                <table class="table table-striped table-bordered table-condensed">
                  <thead>
                    <tr>
                        <th width="7%" style="text-align: center;">No</td>
                        <th width="26%">Kode </td>
                        <th width="50%">Lokasi</td>
                        <th width="10%" style="text-align: center;">Aktif</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query = "SELECT  kode,nama FROM dbo.lokasi  ";
                      $statement = $mssql->db->prepare($query);
                      $statement->execute(); $i=1; 
                      while ($row = $statement->fetch()) { 
                  ?>
                    <tr>
                      <td><?php  echo $i; ?></td>
                      <td><?php echo $row['kode'];?></td>
                      <td><a href="<?php echo $addr_server;?>appl/gudang_barang.php?id=<?php echo $row['kode'];?>">
                      <?php echo $row['nama'];?></a></td>
                      <td align="center">
                          <?php 
                            if($i==1)
                                echo "<i class='icon-ok-sign'></i>";
                            else
                                echo "<div class='align_right'><i class='icon-minus-sign'></i></div>";
                          ?>
                      </td>
                    </tr>
                <?php $i++; } ?>
                </tbody>
              </table>
             </div>
         </div>
         <!-- START TABEL DATA -->
    </div><br>
    <?php include $doc_root.'footer.php';?>
    <?php include $doc_root.'bs_js.php';?>
  </body>



















</html>
