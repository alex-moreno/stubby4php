<?php

namespace Stubby4php;

use Stubby4php\Controller\Threads\ThreadController;

/**
 * Created by PhpStorm.
 * User: alexmoreno
 * Date: 23/08/15
 * Time: 15:00
 */
class StubbyServer {

  private $thread;

  public function __construct($thread = NULL, $config = NULL) {

    if (!$thread) {
      $this->thread = new ThreadController();
    }

    if (!$config) {
//      $this->config = new Config();
    }

    
  }
}