<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;

/**
 * Crf Class
 *
 * Constant Rate Factor
 */
class Crf extends AbstractParameter implements ParameterInterface
{
    private $crf;

    public function __construct(int $crf)
    {
        $this->setCrf($crf);
    }

    public function setCrf(int $crf)
    {
        $this->crf = $crf;
    }

    public function getCrf(): int
    {
        return $this->crf;
    }

    public function getParameters(): array
    {
        return array('-crf', $this->crf);
    }
}
