<?php
$fullNode = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \Kaadon\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \Kaadon\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\Kaadon\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


$balance=$tron->getTransactionBuilder()->contractbalance($tron->getAddress);
foreach($balance as $key =>$item)
{
	echo $item["name"]. " (".$item["symbol"].") => " . $item["balance"] . "\n";
}

