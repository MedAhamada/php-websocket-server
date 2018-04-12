<?php

function publish($data){
    try {
        $context = new ZMQContext();
        $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my-pusher');
        $socket->connect("tcp://localhost:5555");

        $socket->send(json_encode($data));

    }catch (Exception $exception){
        echo $exception->getTraceAsString(); die;
    }
}

if (isset($_POST['_submit'])){
    $data = json_encode($_POST);
    publish($data);
}