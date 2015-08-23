<?php
/**
 * StubbyServer.
 *
 * User: alexmoreno
 * Date: 23/08/15
 * Time: 15:00
 */

namespace Stubby4php;

use Stubby4php\Controller\ThreadController;
use Stubby4php\Controller\ConfigController;

class StubbyServer {

  private $thread;

  public function __construct($thread = NULL, $config = NULL) {

    if (!$thread) {
      $this->thread = new ThreadController();
    }

    if (!$config) {
      $this->config = new ConfigController();
    }

  }

  public function run() {
    // Loop to run the server.
    while(true) {
      // execute socket.
    }

  }
}