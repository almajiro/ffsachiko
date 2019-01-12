<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;
use Almajiro\FFSachiko\FFmpeg\Parameters\Codecs\Video;
use Almajiro\FFSachiko\FFmpeg\Parameters\Codecs\Audio;
use Almajiro\FFSachiko\FFmpeg\Parameters\Codecs\AbstractCodec;
use Almajiro\FFSachiko\Exceptions\InvalidArgumentException;

class Codec extends AbstractParameter implements ParameterInterface
{
    private $codec;

    public function __construct(AbstractCodec $codec)
    {
        $this->codec = $codec;
    }

    public function setCodec(AbstractCodec $codec)
    {
        $this->codec = $codec;
    }

    public function getCodec(): AbstractCodec
    {
        return $this->codec;
    }

    public function getParameters(): array
    {
        if ($this->codec instanceof Video) {
            return array('-c:v', $this->codec->getCodec());
        } elseif ($this->codec instanceof Audio) {
            return array('-c:a', $this->codec->getCodec());
        }

        throw new InvalidArgumentException('Invalid codec type.');
    }
}
