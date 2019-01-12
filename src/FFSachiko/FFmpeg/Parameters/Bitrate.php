<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;
use Almajiro\FFSachiko\FFmpeg\Parameters\Bitrates\Video;
use Almajiro\FFSachiko\FFmpeg\Parameters\Bitrates\Audio;
use Almajiro\FFSachiko\FFmpeg\Parameters\Bitrates\AbstractBitrate;
use Almajiro\FFSachiko\Exceptions\InvalidArgumentException;

class Bitrate extends AbstractParameter implements ParameterInterface
{
    private $bitrate;

    public function __construct(AbstractBitrate $bitrate)
    {
        $this->bitrate = $bitrate;
    }

    public function setBitrate(AbstractBitrate $bitrate)
    {
        $this->bitrate = $bitrate;
    }

    public function getBitrate(): AbstractBitrate
    {
        return $this->bitrate;
    }

    public function getParameters(): array
    {
        if ($this->bitrate instanceof Video) {
            return array('-b:v', $this->bitrate->getBitrate());
        } elseif ($this->bitrate instanceof Audio) {
            return array('-b:a', $this->bitrate->getBitrate());
        }

        throw new InvalidArgumentException('Invalid bitrate.');
    }
}
