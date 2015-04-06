<?php
/**
 * API for test angular - based on BellaPHP v3.1.1
 * Author by @ndaidong at Twitter
 * GitHub : https://github.com/techpush/bella.php
 * Author : Dong Nguyen <ndaidong@techpush.net>
 * Copyright by *.techpush.net
*/

namespace Bella;

require_once realpath(dirname( __FILE__ )).'/vendor/techpush/bella.php/src/autoload.php';

Bella::initialize(function(){

}, function(){
    $controller = false;

    if(!$controller){
        return Bella::loadCoordinator('index');
    }
    else{
        return Bella::loadCoordinator($controller);
    }
});

?>
