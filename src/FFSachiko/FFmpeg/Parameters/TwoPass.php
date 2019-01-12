<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;

class TwoPass extends AbstractParameter implements ParameterInterface
{
    private $pass;

    public function __construct(int $pass)
    {
        $this->setPass($pass);
    }

    public function setPass(int $pass)
    {
        $this->pass = $pass;
    }

    public function getPass(int $pass): int
    {
        return $this->pass;
    }
    
    public function getParameters(): array
    {
        return array('-pass', $this->pass);
    }
}
