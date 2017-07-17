
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

        <style type="text/css">
        body {
            /*background: #222;*/
            /*color: #eee;*/
            margin-top: 20px;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }
        a {
            color: #FFF;
        }
        a:hover {
            color: yellow;
            text-decoration: underline;
        }
        .thumbnails img {
            height: 40px;
            /*border: 4px solid #555;*/
            padding: 1px;
            margin: 0 10px 10px 0;
        }

        .thumbnails img:hover {
            border: 4px solid #00ccff;
            cursor:pointer;
        }

        .preview img {
            /*border: 4px solid #444;*/
            padding: 1px;
            width: 100%;
        }
        </style>
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
                <table >
                        <?php
                            $sqlquery = "SELECT kode,idbarang,namabrg,merkbrg,tipebrg,ukuran,warna FROM dbo.barang   
                              WHERE kode = '$id' ";
                              $results = $mssql->db->prepare($sqlquery);
                              $results->execute(); 
                              foreach( $results as $row ) {
                              // var_dump($row['kode']);
                        ?>

                          <tr>
                              <td width="30%">Kode</td><td width="1%">:</td>
                              <td colspan="6"><?php echo $row['kode'];?></td>
                          </tr>
                          <tr>
                              <td width="30%">ID Barang</td><td width="1%">:</td>
                              <td colspan="6"><?php echo $row['idbarang'];?></td>
                          </tr>
                          <tr>
                              <td width="30%">Nama Barang</td><td width="1%">:</td>
                              <td colspan="6"><?php echo $row['namabrg'];?></td>
                          </tr>
                          <tr>
                              <td width="30%">Merk</td><td width="1%">:</td>
                              <td colspan="6"><?php echo $row['merkbrg'];?></td>
                          </tr>
                          <tr>
                              <td width="30%">Tipe</td><td width="1%">:</td>
                              <td colspan="6"><?php echo $row['tipebrg'];?></td>
                          </tr>
                          <tr>
                              <td width="30%">Ukuran</td><td width="1%">:</td>
                              <td colspan="6"><?php echo $row['ukuran'];?></td>
                          </tr>
                          <tr>
                              <td width="30%">Warna</td><td width="1%">:</td>
                              <td colspan="6"><?php echo $row['warna'];?></td>
                          </tr>
                      <?php } ?>

                      </table>



                <form action="" enctype="multipart/form-data" method="post">
                <input id="file" name="file" type="file" />
                <input id="Submit" name="submit" type="submit" value="Submit" />
                </form>

                <?php

                // Upload and Rename File

                if (isset($_POST['submit']))
                {
                    $filename = $_FILES["file"]["name"];
                    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                    $file_ext = substr($filename, strripos($filename, '.')); // get file name
                    $filesize = $_FILES["file"]["size"];
                    $allowed_file_types = array('.JPEG','.jpg','.png','JPE');  
                    $images = md5($file_basename) . $file_ext;

                    

                    if (in_array($file_ext,$allowed_file_types) && ($filesize < 10000000))
                    {   
                        // Rename file
                        $newfilename = md5($file_basename) . $file_ext;
                        if (file_exists("/home/ubuntu/www/produk_image/" . $newfilename))
                        {
                            // file already exists error
                            echo "You have already uploaded this file.";
                        }
                        else
                        {       
                            move_uploaded_file($_FILES["file"]["tmp_name"], "/home/ubuntu/www/produk_image/" . $newfilename);
                            echo "File uploaded successfully."; 

                              try {

                                  $query = "INSERT dbo.imagebarang (kodebrg,image) values ('$id','$images') ";
                                  $statement = $mssql->db->prepare($query);
                                  $statement->execute();
                                  // var_dump($statement);

                              } catch(PDOException $e) {
                                      echo $e->getMessage();
                              }

                        }
                    }
                    elseif (empty($file_basename))
                    {   
                        // file selection error
                        echo "Please select a file to upload.";
                    } 
                    elseif ($filesize > 10000000)
                    {   
                        // file size error
                        echo "The file you are trying to upload is too large.";
                    }
                    else
                    {
                        // file type error
                        echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
                        unlink($_FILES["file"]["tmp_name"]);
                    }
                    }

                ?>
             </div>
         </div>



         <div class="gallery" align="center">
                <div class="thumbnails">
                <?php 
                   $qimg = "SELECT kodebrg,image FROM dbo.imagebarang   
                           WHERE kodebrg = '$id' ";
                    $statement = $mssql->db->prepare($qimg);
                    $statement->execute(); $i=1;
                    while ($row = $statement->fetch()) { 
                      $img = $row['image'];
                      $link = $addr_server_image."/".$img;
                      // var_dump($link);
                      echo "
                      <img onmouseover='preview.src=img$i.src' name='img$i' src='$link' alt=''/>
                            ";
                      $i++;
                    }
                ?>
                    <!-- <img onmouseover="preview.src=img10.src" name="img10" src="<?php //echo $addr_server;?>upload/dc0e2827c7d11ef188328f5370dd9696.png" alt=""/>
                    <img onmouseover="preview.src=img20.src" name="img20" src="<?php //echo $addr_server;?>upload/1af2f9133f52c64c899c86b0a981de81.png" alt=""/>
                    <img onmouseover="preview.src=img30.src" name="img30" src="<?php //echo $addr_server;?>upload/29880a1da13e54a5f6ffe50a404b0a72.jpg" alt=""/>
 -->
                    
                </div><br/>

                <div class="preview" align="center">
                    <img name="preview"  alt=""/>
                </div>

            </div>
         <!-- START TABEL DATA -->
    </div><br>
    <?php include $doc_root.'footer.php';?>
    <?php include $doc_root.'bs_js.php';?>
  </body>