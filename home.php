
<!DOCTYPE html>
<html lang="en">
   <head>
  <?php 
  include 'script_awal.php';
  include $doc_root.'bs_meta.php';   
  include $doc_root.'bs_css.php';
  ?>
  <link href="asset/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="asset/css/menu_nav.css" rel="stylesheet" type="text/css">
  </head>
 <body>
    <?php include $doc_root.'header.php';?>
    <?php include $doc_root.'menu_top.php';?>  
     <div class="container-fluid">

          
         <!-- START PAGINATION & PESAN NOTIFIKASI -->
         <div class="row-fluid">
            <div class="span7" style="margin-top: 5px;"><?php include $doc_root.'msg.php';?></div>
         </div>
         <!-- END PAGINATION & PESAN NOTIFIKASI -->
             
         <!-- START TABEL DATA -->
         <div class="row-fluid"> 
             <div class="span12"> Welcome to CPS ...</div>
         </div>
         <!-- START TABEL DATA -->
    </div><br>
    <?php include $doc_root.'footer.php';?>
    <?php include $doc_root.'bs_js.php';?>
  </body>
</html>
