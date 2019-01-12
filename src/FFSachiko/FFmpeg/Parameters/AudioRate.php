<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;

class AudioRate extends AbstractParameter implements ParameterInterface
{
    private $rate = 44100;

    public function __construct(int $rate = 44100)
    {
        $this->setRate($rate);
    }

    public function setRate(int $rate)
    {
        $this->rate = $rate;
    }

    public function getRate(): int
    {
        return $this->rate;
    }

    public function getParameters(): array
    {
        return array('-ar', $this->rate);
    }
}
