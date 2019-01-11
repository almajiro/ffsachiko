<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;
use Almajiro\FFSachiko\FFmpeg\Parameters\VideoFilters\AbstractVideoFilter;

class VideoFilters extends AbstractParameter implements ParameterInterface
{
    private $filters = [];

    public function addFilter(AbstractVideoFilter $filter)
    {
        $this->filters[] = $filter;
    }

    public function getParameters(): array
    {
        $filters = '';

        foreach ($this->filters as $key => $filter) {
            $filters .= $filter->getFilter();

            if (count($this->filters) - 1 !== $key) {
                $filters .= ',';
            }
        }

        return array('-vf', $filters);
    }
}
