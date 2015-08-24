<?php

/**
 * SocketController.
 *
 * User: alexmoreno
 * Date: 23/08/15
 * Time: 12:41
 */

namespace Stubby4php\Socket;

class SocketController {

  /**
   * Default constructor.
   *
   * @param string $address
   *   IP to bind the socket to.
   * @param string $port
   *   Port where we'll be creating the socket.
   */
  public function __construct($address = 'tcp://127.0.0.1', $port = '8882') {
      $this->socket = stream_socket_server($address . ':' . $port, $errno, $errorMessage);
    if ($this->socket == FALSE) {
      echo 'Address:Port is already on use' . PHP_EOL;
    }
    else{
      echo 'Listening requests' . PHP_EOL;
    }
  }

  /**
   * Listen for connections.
   */
  public function run() {

    while ($this->socket) {
      // Keep the server always listening.
      $client = stream_socket_accept($this->socket, -1);

      if ($client) {
        echo 'Incoming connection.' . PHP_EOL;

        $request = stream_socket_recvfrom($client, 2048);

        if ($request) {
          echo 'Request: ' . PHP_EOL . $request;

          // Send the handshake.
          stream_socket_sendto($client, $this->dohandshake($request));

          // And send the information requested.
          // @todo: fetch the information based on the getResource().
          stream_socket_sendto($client, "<xml>Hey human</xml>");
        }

        // And close the client.
        fclose($client);
      }
      else {
        exit;
      }
    }
  }

  /**
   * Return the handshake based on the Request.
   * @param $request
   *   Request from the client.
   *
   * @return string
   *   Handshake ready to be sent to the client.
   */
  private function dohandshake($request) {
    $handshake  = "HTTP/1.1 200 Web Socket Protocol Handshake\r\n" .
      "Upgrade: WebSocket\r\n" .
      "Connection: Upgrade\r\n" .
      "WebSocket-Origin: " . $this->getOrigin($request) . "\r\n" .
      "WebSocket-Location: ws://" . $this->getHost($request) . $this->getResource($request) . "\r\n" .
      "\r\n";

    return $handshake;
  }

  /**
   * Get resource requested by the client.
   *
   * @param string $request
   *   Request sent by the client
   *
   * @return string
   *   Resource or url requested by the client.
   */
  public function getResource($request) {
    $resource = '';

    // @todo: cache this results.
    if(preg_match("/GET (.*) HTTP/", $request, $match)) {
      $resource = $match[1];
    }

    return $resource;
  }

  /**
   * Get HOST requested by the client.
   *
   * @param string $request
   *   Request sent by the client
   *
   * @return string
   *   Host requested by the client.
   */
  public function getHost($request) {
    $host = "";

    // @todo: cache this results.
    if(preg_match("/Host: (.*)\r\n/", $request, $match)) {
      $host = $match[1];
    }

    return $host;
  }


  /**
   * Get HOST requested by the client.
   *
   * @param string $request
   *   Request sent by the client
   *
   * @return string
   *   Host requested by the client.
   */
  public function getOrigin($request) {
    // @TODO: Accept regex.
    $origin = "";

    // @todo: cache this results.
    if(preg_match("/Origin: (.*)\r\n/", $request, $match)) {
      $origin = $match[1];
    }

    return $origin;
  }

}
