<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters\Bitrates;

use Almajiro\FFSachiko\FFmpeg\Parameters\Streams\AbstractStream;

abstract class AbstractBitrate extends AbstractStream
{
    protected $bitrate;

    public function __construct(string $bitrate)
    {
        $this->setBitrate($bitrate);
    }

    public function setBitrate(string $bitrate)
    {
        $this->bitrate = $bitrate;

        return $this;
    }

    public function getBitrate(): string
    {
        return $this->bitrate;
    }
}
