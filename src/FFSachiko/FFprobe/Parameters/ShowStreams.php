<?php

namespace Almajiro\FFSachiko\FFprobe\Parameters;

use Almajiro\FFSachiko\FFprobe\AbstractParameter;
use Almajiro\FFSachiko\FFprobe\ParameterInterface;

class ShowStreams extends AbstractParameter implements ParameterInterface
{
    public function getParameters(): array
    {
        return array('-show_streams');
    }
}
