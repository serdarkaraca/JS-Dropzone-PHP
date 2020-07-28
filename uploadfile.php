<?php
/**
 * Created by PhpStorm.
 * User: serdarkaraca
 * E-Mail: serdar@serdarkaraca.com
 * Date: 28/07/2020
 * Time: 19:50
 */


$target_dir = "UploadedFiles/";


if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $status = 1;
}