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
    $allowed_file_types = array('.doc','.docx','.rtf','.pdf','.jpg','.png');  

    if (in_array($file_ext,$allowed_file_types) && ($filesize < 500000))
    {   
        // Rename file
        $newfilename = md5($file_basename) . $file_ext;
        if (file_exists("/opt/lampp/htdocs/gudangspc/upload/" . $newfilename))
        {
            // file already exists error
            echo "You have already uploaded this file.";
        }
        else
        {       
            move_uploaded_file($_FILES["file"]["tmp_name"], "/opt/lampp/htdocs/gudangspc/upload/" . $newfilename);
            echo "File uploaded successfully.";     
        }
    }
    elseif (empty($file_basename))
    {   
        // file selection error
        echo "Please select a file to upload.";
    } 
    elseif ($filesize > 500000)
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