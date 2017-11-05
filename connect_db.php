<?php

$con=mysqli_connect('localhost','root','root','pharmacy');
if(!$con)
{
    mysqli_error("connection failed",$con);
}

?>