<?php
/**
 * StubbyServer.
 *
 * User: alexmoreno
 * Date: 23/08/15
 * Time: 15:00
 */

namespace Stubby4php;

use Stubby4php\Socket\SocketController;
use Stubby4php\Controller\ThreadController;
use Stubby4php\Controller\ConfigController;

class StubbyServer {

  private $thread;

  /**
   * Default constructor.
   *
   * @param null $socket
   * @param null $thread
   * @param null $config
   */
  public function __construct($socket = NULL, $thread = NULL, $config = NULL) {

    if (!$thread) {
      $this->thread = new ThreadController();
    }

    if (!$config) {
      $this->config = new ConfigController();
    }

    if (!$socket) {
      // @TODO: inject a class to do the websocket and the handshake.
      $this->socket = new SocketController();
    }
  }

  /**
   * Run the server.
   */
  public function run() {
    // Loop to run the server.
    $this->socket->run();
  }
}
