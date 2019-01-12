<?php

namespace Almajiro\FFSachiko\FFprobe\Parameters;

use Almajiro\FFSachiko\FFprobe\AbstractParameter;
use Almajiro\FFSachiko\FFprobe\ParameterInterface;

/**
 * PrintFormat class
 *
 * Set the output printing format.
 * writer_name specifies the name of the writer, and writer_options specifies the options to be passed to the writer.
 */
class PrintFormat extends AbstractParameter implements ParameterInterface
{
    private $writerName = 'json';

    public function __construct(string $writerName)
    {
        $this->setWriterName($writerName);
    }

    public function setWriterName(string $writerName)
    {
        $this->writerName = $writerName;

        return $this;
    }

    public function getWriterName(): string
    {
        return $this->writerName;
    }

    public function getParameters(): array
    {
        return array('-print_format', $this->writerName);
    }
}
