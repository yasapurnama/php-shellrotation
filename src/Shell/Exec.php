<?php 

namespace Yasapurnama\PhpShellRotation\Shell;

use Yasapurnama\PhpShellRotation\ShellUtility;

class Exec extends ShellUtility
{
    public function run($cmd)
    {
        exec($cmd, $this->output, $this->exitStatus);
        $this->output = implode(PHP_EOL, $this->output) . PHP_EOL;

        return [
            $this->output,
            $this->exitStatus
        ];
    }

    public function isUseable()
    {
        if (!function_exists('exec'))
            return false;

        $result = $this->run('whoami');
        if (strlen($result[0]) == 0 || $result[1] != 0)
            return false;

        return true;
    }
}