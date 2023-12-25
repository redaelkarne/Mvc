<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\TestEmailCommand;

$application = new Application();
$application->add(new TestEmailCommand());
$application->run();