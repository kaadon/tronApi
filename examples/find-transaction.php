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

$detail = $tron->getTransaction('TxId');
var_dump($detail);