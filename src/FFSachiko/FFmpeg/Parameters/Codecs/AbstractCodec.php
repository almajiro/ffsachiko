<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters\Codecs;

use Almajiro\FFSachiko\FFmpeg\Parameters\Streams\AbstractStream;

abstract class AbstractCodec extends AbstractStream
{
    protected $codec;

    public function __construct(string $codec)
    {
        $this->setCodec($codec);
    }

    public function setCodec(string $codec)
    {
        $this->codec = $codec;

        return $this;
    }

    public function getCodec(): string
    {
        return $this->codec;
    }
}
