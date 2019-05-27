<?php
    $name = $_REQUEST['nombre'];
    $age = $_REQUEST['edad'];
    $city = $_REQUEST['ciudad'];

    $vector =["name"=>$name, "age"=>$age, "city"=>$city];
    
    echo json_encode($vector);