<?php
$context = new ZMQContext(1);

$req = new ZMQSocket($context, ZMQ::SOCKET_REQ);
try {

    $req->connect('tcp://*:5555');

    for ($i=0; $i<10; $i++){
        printf ("Sending Hello %d…\n", $i);
        $req->send('Hello');
        echo "Received ".$req->recv()."<br>";
    }

}catch (ZMQSocketException $exception){
    echo $exception->getTraceAsString();
}
