<?php 

namespace Yasapurnama\PhpShellRotation\Shell;

use Yasapurnama\PhpShellRotation\ShellUtility;

class Passthru extends ShellUtility
{
    public function run($cmd)
    {
        ob_start();
        passthru($cmd, $this->exitStatus);
        $this->output = ob_get_contents();
        ob_end_clean();

        return [
            $this->output,
            $this->exitStatus
        ];
    }

    public function isUseable()
    {
        if (!function_exists('passthru'))
            return false;

        $result = $this->run('whoami');
        if (strlen($result[0]) == 0 || $result[1] != 0)
            return false;

        return true;
    }
}