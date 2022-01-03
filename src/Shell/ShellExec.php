<?php 

namespace Yasapurnama\PhpShellRotation\Shell;

use Yasapurnama\PhpShellRotation\ShellUtility;

class ShellExec extends ShellUtility
{
    public function run($cmd)
    {
        $this->output = shell_exec($cmd);
        $this->exitStatus = 0;

        return [
            $this->output,
            $this->exitStatus
        ];
    }

    public function isUseable()
    {
        if (!function_exists('shell_exec'))
            return false;

        $result = $this->run('whoami');
        if (strlen($result[0]) == 0 || $result[1] != 0)
            return false;

        return true;
    }
}