<?php

namespace MyWSS;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
require dirname(__DIR__) . '/vendor/autoload.php';

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
/*
    function encode($socketData, $type = "text", $masked = false){
        $b1 = 0x80 | (0x1 & 0x0f);
        $length = strlen($socketData);
        if ($length <= 125)
            $header = pack('CC', $b1, $length);
        elseif ($length > 125 && $length < 65536)
            $header = pack('CCn', $b1, 126, $length);
        elseif ($length >= 65536)
            $header = pack('CCNN', $b1, 127, $length);
        return $header . $socketData;
    }
    
    function decode($socketData){
        $length = ord($socketData[1]) & 127;
        if ($length == 126) {
            $masks = substr($socketData, 4, 4);
            $data = substr($socketData, 8);
        } elseif ($length == 127) {
            $masks = substr($socketData, 10, 4);
            $data = substr($socketData, 14);
        } else {
            $masks = substr($socketData, 2, 4);
            $data = substr($socketData, 6);
        }
        $socketData = "";
        for ($i = 0; $i < strlen($data); ++$i) {
            $socketData .= $data[$i] ^ $masks[$i % 4];
        }
        return $socketData;
    }
    
    function onOpen($connect, $info) {
        echo $info['Cookie'] .' connect ok' . PHP_EOL;
    }
    
    function onClose($connect, $info) {
        echo $info['Cookie'] ." close OK" . PHP_EOL;
    }
    
    function onMessage($connect, $data, $info) {
        if ($data) {
            $f = decode($data);
            $messageObj = json_decode($f);
            if (isset($messageObj)) {
                if ($messageObj->type == 1 || $messageObj->type == 2 || $messageObj->type == 3)
                    $chat_box_message = createNewNotification($messageObj->user_from, $messageObj->user_to, $messageObj->type, $messageObj->message);
                else if($messageObj->type == 19 || $messageObj->type == 18)
                    $chat_box_message = createChatBoxStatus1($messageObj->user_from, $messageObj->user_to, $messageObj->type);
                else if ( $messageObj->type == 11)
                    $chat_box_message = createChatBoxMessage($messageObj->user_from, $messageObj->user_to, $messageObj->message, $messageObj->type);
                else if ($messageObj->type == 13)
                    $chat_box_message = createChatNotification($messageObj->user_from, $messageObj->user_to, $messageObj->message, $messageObj->type);
                foreach ($info as $users) {
                    foreach ($chat_box_message['user_to'] as $cookie) {
                        if ($cookie['session_name'] === $users['info'] && is_resource($users['socket'])) {
                            fwrite($users['socket'], encode(json_encode($chat_box_message)));
                        }
                    }
                }
            }
        }
    }
    */
}
