<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$loop   = React\EventLoop\Factory::create();
$pusher = new StorytellingApp\WsServer\Pusher();

$context = new React\ZMQ\Context($loop);
$pull = $context->getSocket(ZMQ::SOCKET_PULL);
$pull->bind('tcp://*:5555');
$pull->on('message', array($pusher, 'handleNewMessage'));

// Set up our WebSocket server for clients wanting real-time updates
$webSock = new React\Socket\Server('127.0.0.1:8888', $loop);

$webServer = new Ratchet\Server\IoServer(
    new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(
            new Ratchet\Wamp\WampServer(
                $pusher
            )
        )
    ),
    $webSock
);

$loop->run();