<?php
namespace App;

require 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('Log Entries');
$log->pushHandler(new StreamHandler('logEntries.log', Logger::INFO));

function log($logEntry) 
{
    global $log;
    $log->info($logEntry);
}
?>
