<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;

class Input extends AbstractParameter implements ParameterInterface
{
    private $file;

    public function __construct(string $file)
    {
        $this->setFile($file);
    }

    public function setFile(string $file)
    {
        $this->file = $file;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function getParameters(): array
    {
        return array('-i', $this->file);
    }
}
