<?php
/**
 * StubbyCommand.
 *
 * User: alexmoreno
 * Date: 23/08/15
 * Time: 19:43
 */

namespace Stubby4php\Command;

use Stubby4php\StubbyServer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class StubbyCommand extends Command {

  protected function configure()
  {
    $this
      ->setName('Stubby4php')
      ->setDescription('Greet someone');
//      ->addArgument(
//        '',
//        InputArgument::REQUIRED,
//        'Still to decide?'
//      );
//      ->addOption(
//        'yell',
//        null,
//        InputOption::VALUE_NONE,
//        'If set, the task will yell in uppercase letters'
//    );
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $output->writeln('Listening requests.');

    $server = new StubbyServer();
    $server->run();

  }
}