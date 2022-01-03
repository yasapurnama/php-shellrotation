<?php 

namespace Yasapurnama\PhpShellRotation\Shell;

use Yasapurnama\PhpShellRotation\ShellUtility;

class ProcOpen extends ShellUtility
{
    public function run($cmd)
    {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("file", "/tmp/error-output.txt", "a")
        );

        $cwd = getcwd();
        $env = array('some_option' => 'aeiou');

        $process = proc_open($cmd, $descriptorspec, $pipes, $cwd, $env);

        if (is_resource($process)) {
            $this->output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            $this->exitStatus = proc_close($process);
        }

        return [
            $this->output,
            $this->exitStatus
        ];
    }

    public function isUseable()
    {
        if (!function_exists('proc_open'))
            return false;

        $result = $this->run('whoami');
        if (strlen($result[0]) == 0 || $result[1] != 0)
            return false;

        return true;
    }
}