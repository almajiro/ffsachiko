<?php

namespace Almajiro\FFSachiko;

use Symfony\Component\Process\Process;
use Almajiro\FFSachiko\Exceptions\ProcessFailedException;

abstract class AbstractExecutable
{
    protected $command;

    protected $arguments = [];

    protected $prefix = '--';

    protected $process;

    protected function setCommand(string $command)
    {
        $this->command = $command;

        return $this;
    }

    protected function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function addArgument(string $argument, bool $withPrefix = true)
    {
        if ($withPrefix) {
            $this->arguments[] = $this->prefix . $argument;
        } else {
            $this->arguments[] = $argument;
        }

        return $this;
    }

    public function setArgument(array $arguments)
    {
        $this->arguments = [];

        foreach ($arguments as $argument) {
            $this->addArgument($argument);
        }
        return $this;
    }

    public function clearArgument()
    {
        $this->arguments = [];

        return $this;
    }

    public function prepare()
    {
        $executeCommand[0] = $this->command;
        foreach ($this->arguments as $key => $argument) {
            $executeCommand[$key + 1] = $argument;
        }

        $this->process = new Process($executeCommand);

        return $this;
    }

    public function run()
    {
        $this->process()->run();
        $this->isSuccessful();
    }

    public function process(): Process
    {
        return $this->process;
    }

    public function getOutput()
    {
        $this->isSuccessful();

        return $this->process()->getOutput();
    }

    private function isSuccessful()
    {
        if (!$this->process()->isSuccessful()) {
            throw new ProcessFailedException($this->process()->getErrorOutput());
        }
    }
}
