<?php
$fullNode = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \Kaadon\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\Kaadon\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


try {
    $transaction = $tron->getTransactionBuilder()->sendTrx('to', 2,'fromAddress');
    $signedTransaction = $tron->signTransaction($transaction);
    $response = $tron->sendRawTransaction($signedTransaction);
} catch (\Kaadon\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}
