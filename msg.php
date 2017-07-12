<?php
if(isset($_SESSION['notif']))
    if($_SESSION['notif']!=''){                       
?>
    <span class="alert alert-info">
        <?php
                echo $_SESSION['notif'];
                $_SESSION['notif'] = '';
        ?>
    </span>
<?php
}
?>
<?php
if(isset($_SESSION['warning']))
if($_SESSION['warning']!=''){                       
?>
    <span class="alert alert-error">
        <?php
                echo $_SESSION['warning'];
                $_SESSION['warning'] = '';
        ?>
    </span>
<?php
}
?>