<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters\VideoFilters;

interface VideoFilterInterface
{
    public function getFilter(): string;
}
