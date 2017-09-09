<?php 
    session_start();
    $doc_root = $_SERVER['DOCUMENT_ROOT'].'/gudang/';
    $addr_root_pics = 'http://'.$_SERVER['HTTP_HOST'].'/gudang/asset/pics/';
    $addr_root_js = 'http://'.$_SERVER['HTTP_HOST'].'/gudang/asset/js/';
    $addr_root_css = 'http://'.$_SERVER['HTTP_HOST'].'/gudang/asset/css/';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include $doc_root.'bs_meta.php'; ?>
    <?php include $doc_root.'bs_css.php';?>   
    
  </head>
<body>
    <div class="container-fluid" style="margin-top: 5em;">
        <div class="row-fluid">
            <div class="span3">&nbsp;</div>
            <div class="span6" style="text-align: center; margin-bottom: 10px;"><?php include $doc_root.'msg.php';?></div>
            <div class="span3">&nbsp;</div>    
        </div>

        <div class="row-fluid">
            <div class="span4">&nbsp;</div>
            <div class="span4">
                <form name="myForm" class="well" action="login/login.php" method="POST">
                    <p><h3 style="text-align: center;">Center Point Sale</h3></p><hr>
                    <table  width="90%" align="center" class="cst_table">
                        <tr>
                            <td align="center" width="14%">&nbsp;</td>
                            <td width="73%"><div align="center">
                              <input type="text" name="username" class="span2" id="username" autocomplete="off" placeholder="USERNAME">
                            </div></td>
                              <td align="center" width="13%">&nbsp;</td>
                      </tr>
                        <tr>
                            <td align="center" width="14%">&nbsp;</td><td><div align="center">
                              <input type="password" name="password" class="span2" autocomplete="off" placeholder="PASSWORD">
                            </div></td>
                            <td align="center" width="13%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" width="14%">&nbsp;</td><td><div align="center"><span style="float: center;">
                              <input type="submit" name="submit" value="Login" class="btn btn-inverse">
                            </span></div></td>
                            <td align="center" width="13%">&nbsp;</td>
                        </tr>
                      <tr>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="span4">&nbsp;</div>
        </div>
        <?php include  $doc_root.'bs_js.php';		?>  
    </div>
</body>
</html>

 <script type="text/javascript">
    $(function(){
        $("#username").focus();
        $("#username").val('');
        $('#password').val('');

        $("#username").keyup(function(){
            $('#password').val('');
        })
        $("#username").blur(function(){
            $('#password').val('');
        })
    })
</script>


   
