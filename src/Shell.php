<?php

namespace Yasapurnama\PhpShellRotation;

class Shell
{
    protected $shell;

    protected $result;

    protected $phpShells = [
        'System',
        'Exec',
        'ShellExec',
        'Backtick',
        'Passthru',
        'Popen',
        'ProcOpen',
    ];

    public function __construct()
    {
        $this->shell = $this->determineShell();
    }

    public function getShell()
    {
        return $this->shell;
    }

    public function getOutput()
    {
        return $this->result[0] ?? '';
    }

    public function getStatus()
    {
        return $this->result[1] ?? 1;
    }

    public function exec($cmd)
    {
        if ($this->shell) {
            $shellClass   = 'Yasapurnama\\PhpShellRotation\\Shell\\' . $this->shell;
            $shellUtil    = new $shellClass();
            $this->result = $shellUtil->run(escapeshellcmd($cmd));

            return $this->result[0];

        } else {
            throw new \Exception(
                'No PHP shell can be used. Please contact your hosting provider.'
            );
        }
    }

    public function determineShell()
    {
        foreach ($this->phpShells as $shell) {

            $shellClass = 'Yasapurnama\\PhpShellRotation\\Shell\\' . $shell;
            $shellUtil  = new $shellClass();

            if ($shellUtil->isUseable()) {
                return $shell;
            }

        }
    }
}