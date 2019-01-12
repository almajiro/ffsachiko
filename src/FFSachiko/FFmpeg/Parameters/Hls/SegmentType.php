<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters\Hls;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;
use Almajiro\FFSachiko\Exceptions\InvalidArgumentException;

class SegmentType extends AbstractParameter implements ParameterInterface
{
    private $type;

    public function __construct(string $type)
    {
        $this->setType($type);
    }

    public function setType(string $type)
    {
        if ($type === 'mpegts' || $type === 'fmp4') {
            $this->type = $type;

            return $this;
        }
        
        throw new InvalidArgumentException(sprintf('Invalid Segment Type %s', $type));
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getParameters(): array
    {
        return array('-hls_segment_type', $this->type);
    }
}