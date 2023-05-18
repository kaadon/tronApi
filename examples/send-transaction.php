<?php
include_once '../vendor/autoload.php';

$fullNode = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \Kaadon\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\Kaadon\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$tron->setAddress('address');
$tron->setPrivateKey('privateKey');

try {
    $transfer = $tron->send( 'ToAddress', 1);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);