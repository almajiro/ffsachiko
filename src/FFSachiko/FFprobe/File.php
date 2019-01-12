<?php

namespace Almajiro\FFSachiko\FFprobe;

use Almajiro\FFSachiko\FFprobe;
use Almajiro\FFSachiko\FFprobe\AbstractParameter;
use Almajiro\FFSachiko\FFprobe\Parameters\PrintFormat;
use Almajiro\FFSachiko\Exceptions\InvalidArgumentException;

class File {

    private $ffprobe;

    private $file;

    private $parameters = [];

    public function __construct(string $file, FFprobe $ffprobe)
    {
        $this->ffprobe = $ffprobe;
        $this->file = $file;

        if (!file_exists($this->file)) {
            throw new InvalidArgumentException(sprintf('Unable to open %s', $file));
        }
    }

    public function file(): string
    {
        return $this->file;
    }

    public function get()
    {
        $this->ffprobe->clearArgument();
        $this->add(new PrintFormat('json'));
       
        $this->ffprobe->addArgument($this->file, false);
        foreach ($this->parameters as $parameter) {
            foreach ($parameter->getParameters() as $option) {
                $this->ffprobe->addArgument($option, false);
            }
        }

        $this->ffprobe->prepare()->run();

        return json_decode($this->ffprobe->getOutput(), true);
    }

    public function add(AbstractParameter $parameter)
    {
        $this->parameters[] = $parameter;

        return $this;
    }

    public function clear()
    {
        $this->parameters = [];

        return $this;
    }
}
