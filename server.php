<?php

require 'vendor/autoload.php';

$loop   = React\EventLoop\Factory::create();
$pusher = new \StorytellingApp\WsServer\Pusher();


// $loop->run();
