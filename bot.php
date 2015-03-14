<?php
require_once __DIR__.'/vendor/autoload.php';
stream_set_blocking(STDIN, false);
$match = new \Poker\Model\Match();
while (1) {
    $line = fgets(STDIN,1024);
    if ($line) {
        $parser = new \Poker\Command\Parser($match, $line);
        $return = $parser->handle();
        if ($return !== null) {
            echo $return.PHP_EOL;
        }
    }
}