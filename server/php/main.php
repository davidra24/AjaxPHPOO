<?php
    require_once ('../../vendor/autoload.php');
    use php\api\Api;

    $opt = $_REQUEST['opt'];
    $dpto = 0;
    if(isset($_REQUEST['dpto']) && $_REQUEST['dpto']!=null){
        $dpto = $_REQUEST['dpto'];
    }
    main($opt, $dpto);

    function main($opt, $dpto){
        $api = new Api();
        $api->setOpt($opt);
        if($dpto!=null){
            $api->setDpto($dpto);
        }
        echo $api->_get();   
    }