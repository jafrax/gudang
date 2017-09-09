
<!DOCTYPE html>
<html lang="en">
   <head>
  <?php 
  include '../script_awal.php';
  include $doc_root.'bs_meta.php';   
  include $doc_root.'bs_css.php';
  require_once "../class/config_mssql.php";
  $mssql = new pdo_dblib_mssql();
  $id = $_GET['id'];
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
                  DETAIL BARANG 
                  <?php echo $id; ?>
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
                        <th width="5%" style="text-align: center;">No</td>
                        <th width="80%">Nama</td>
                        <th width="20%">Aksi</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql = "SELECT kodebrg,image FROM dbo.imagebarang   
                           WHERE kodebrg = '$id' ";
                    $statement = $mssql->db->prepare($sql);
                    $statement->execute(); $i=1;
                     while ($row = $statement->fetch()) { 
                     	$img = $row['image'];
                      $link = $addr_server_image."/".$img;
                  ?>
                    <tr>
                      <td><?php  echo $i; ?></td>
                      <td><img src="<?php echo $link;?>" height="50" width="50"></td>
                      <td class="tooltip-demo" align="left">
                          <a href='<?php echo 'del_img.php?id='.$img;?>' rel="tooltip"><i class=" icon-trash "></i>
                          </a>
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
