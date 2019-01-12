<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters\Tags;

use Almajiro\FFSachiko\FFmpeg\Parameters\Streams\AbstractStream;

abstract class AbstractTag extends AbstractStream
{
    protected $tag;

    public function __construct(string $tag)
    {
        $this->setTag($tag);
    }

    public function setTag(string $tag)
    {
        $this->tag = $tag;

        return $this;
    }

    public function getTag(): string
    {
        return $this->tag;
    }
}
