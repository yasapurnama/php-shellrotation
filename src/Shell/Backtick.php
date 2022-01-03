<?php 

namespace Yasapurnama\PhpShellRotation\Shell;

use Yasapurnama\PhpShellRotation\ShellUtility;

class Backtick extends ShellUtility
{
    public function run($cmd)
    {
        $this->output = `$cmd`;
        $this->exitStatus = 0;

        return [
            $this->output,
            $this->exitStatus
        ];
    }

    public function isUseable()
    {
        $result = $this->run('whoami');
        if (strlen($result[0]) == 0 || $result[1] != 0)
            return false;

        return true;
    }
}