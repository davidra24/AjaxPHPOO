<?php
    $numOne = $_GET['numberOne'];
    $numTwo = $_GET['numberTwo'];

    $array = ['One' => $numOne, 'Two' => $numTwo];

    echo json_encode($array);
    