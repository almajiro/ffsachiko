<?php

namespace Almajiro\FFSachiko;

use Symfony\Component\Process\Process;
use Almajiro\FFSachiko\Exceptions\ProcessFailedException;

abstract class AbstractExecutable
{
    private $command;

    private $arguments = [];

    private $prefix = '--';

    private $process;

    private $timeout = 3600;

    private $preparedArguments = [];

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

    public function setTimeout(int $timeout = 3600)
    {
        $this->timeout = $timeout;
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
        $this->preparedArguments = [];

        $this->preparedArguments[0] = $this->command;
        foreach ($this->arguments as $key => $argument) {
            $this->preparedArguments[$key + 1] = $argument;
        }

        $this->process = new Process($this->preparedArguments);
        return $this;
    }

    public function dump(): array
    {
        return $this->preparedArguments;
    }

    public function run()
    {
        $this->process()->setTimeout($this->timeout)->run();
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
