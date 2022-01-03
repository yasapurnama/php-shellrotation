<?php

use Yasapurnama\PhpShellRotation\Shell;

include 'vendor/autoload.php';


$shell  = new Shell();
$output = $shell->exec('ls -lah');

print_r($output);