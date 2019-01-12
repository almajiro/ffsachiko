<?php

namespace Almajiro\FFSachiko\FFprobe\Parameters;

use Almajiro\FFSachiko\FFprobe\AbstractParameter;
use Almajiro\FFSachiko\FFprobe\ParameterInterface;

class LogLevel extends AbstractParameter implements ParameterInterface
{
    private $level = 'error';

    public function __construct(string $level = 'error')
    {
        $this->setLevel($level);
    }

    public function setLevel(string $level)
    {
        $this->level = $level;

        return $this;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getParameters(): array
    {
        return array('-loglevel', $this->level);
    }
}
