<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters\VideoFilters;

use Almajiro\FFSachiko\FFmpeg\Parameters\VideoFilters\AbstractVideoFilter;
use Almajiro\FFSachiko\FFmpeg\Parameters\VideoFilters\VideoFilterInterface;

class Scale extends AbstractVideoFilter implements VideoFilterInterface
{
    private $width;

    private $height;

    public function __construct(
        int $width,
        int $height
    ) {
        $this->height = $height;
        $this->width = $width;
    }

    public function getFilter(): string
    {
        return 'scale=' . $this->width . ':' . $this->height;
    }
}
