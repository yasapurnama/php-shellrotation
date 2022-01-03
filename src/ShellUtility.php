<?php

namespace Yasapurnama\PhpShellRotation;

abstract class ShellUtility
{
    protected $output;

    protected $exitStatus;

    abstract public function run($cmd);

    abstract public function isUseable();
}