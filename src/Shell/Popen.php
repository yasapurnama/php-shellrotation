<?php 

namespace Yasapurnama\PhpShellRotation\Shell;

use Yasapurnama\PhpShellRotation\ShellUtility;

class Popen extends ShellUtility
{
    public function run($cmd)
    {
        $handle = popen($cmd, "r");
        $this->output = fread($handle, 2096);
        pclose($handle);
        $this->exitStatus = 0;

        return [
            $this->output,
            $this->exitStatus
        ];
    }

    public function isUseable()
    {
        if (!function_exists('popen'))
            return false;

        $result = $this->run('whoami');
        if (strlen($result[0]) == 0 || $result[1] != 0)
            return false;

        return true;
    }
}