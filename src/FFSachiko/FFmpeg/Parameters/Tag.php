<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;
use Almajiro\FFSachiko\FFmpeg\Parameters\Tags\Video;
use Almajiro\FFSachiko\FFmpeg\Parameters\Tags\Audio;
use Almajiro\FFSachiko\FFmpeg\Parameters\Tags\AbstractTag;
use Almajiro\FFSachiko\Exceptions\InvalidArgumentException;

class Tag extends AbstractParameter implements ParameterInterface
{
    private $tag;

    public function __construct(AbstractTag $tag)
    {
        $this->tag = $tag;
    }

    public function setTag(AbstractTag $tag)
    {
        $this->tag = $tag;
    }

    public function getTag(): AbstractTag
    {
        return $this->tag;
    }

    public function getParameters(): array
    {
        if ($this->tag instanceof Video) {
            return array('-tag:v', $this->tag->getTag());
        } elseif ($this->tag instanceof Audio) {
            return array('-tag:a', $this->tag->getTag());
        }

        throw new InvalidArgumentException('Invalid tag type.');
    }
}
