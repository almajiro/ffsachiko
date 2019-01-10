<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;

class Threads extends AbstractParameter implements ParameterInterface
{
    private $threads;

    public function __construct(int $threads = 4)
    {
        $this->setThreads($threads);
    }

    public function setThreads(int $threads)
    {
        $this->threads = $threads;
    }

    public function getThreads(): int
    {
        return $this->threads;
    }

    public function getParameters(): array
    {
        return array('-threads', $this->threads);
    }
}
