<?php

/**
 * SocketController.
 *
 * User: alexmoreno
 * Date: 23/08/15
 * Time: 12:41
 */

namespace Stubby4php\Controller;

class SocketController {

  /**
   * Default constructor.
   *
   * @param string $ip
   * @param string $port
   */
  public function __construct($ip = '127.0.0.1', $port = '8882') {
    $this->server = stream_socket_server("tcp://127.0.0.1:8882", $errno, $errorMessage);

    if ($this->server === false) {
      throw new \UnexpectedValueException("Could not bind to socket: $errorMessage");
    }

  }

  /**
   * Listen for connections.
   */
  public function run() {

    // Keep the server always listening.
    while (TRUE) {
      $client = @stream_socket_accept($this->server);

      if ($client) {
        echo 'Accepted connection, sending response.' . PHP_EOL;

        // Send answer.
        stream_socket_sendto($client, 'test');
        // And close the client.
        fclose($client);
      }
    }
  }
}