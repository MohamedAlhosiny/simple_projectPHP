<?php
define('base_url', 'http://localhost/finalDemo/');

function url($path = null)
{
    echo base_url . $path;
}


function path($path = null)
{
    $location = base_url . $path;

    echo "<script> 
    window.location.replace('$location')
    </script>";
}
function filterString($input_value = null)
{
    // $input_value = trim($input_value);
    // $input_value = strip_tags($input_value);
    // $input_value = htmlspecialchars($input_value);
    $input_value = stripslashes($input_value);
    return $input_value;
}

function stringValidation($input_value, $min)
{
    $value = empty($input_value);
    $len = strlen($input_value) <= $min;
    if ($value || $len) {
        return true;
    } else {
        return false;
    }
}
function imageValidation($image_name, $image_size, $limit_size)
{
    $empty = empty($image_name);
    $size = ($image_size / 1024) / 1024;
    $limit = $size > $limit_size;
    if ($empty || $limit) {
        return true;
    } else {
        return false;
    }
}
