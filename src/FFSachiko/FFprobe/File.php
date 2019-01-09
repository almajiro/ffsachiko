<?php

namespace Almajiro\FFSachiko\FFprobe;

use Almajiro\FFSachiko\FFprobe;
use Almajiro\FFSachiko\Exceptions\InvalidArgumentException;

class File {

    private $ffprobe;

    private $file;

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

    public function formats()
    {
        $this->ffprobe->clearArgument()->addArgument('show_format');
        
        return $this->getJson();
    }

    public function frames()
    {
        $this->ffprobe->clearArgument()->addArgument('show_frames');

        return $this->getJson();
    }

    public function streams()
    {
        $this->ffprobe->clearArgument()->addArgument('show_streams');

        return $this->getJson();
    }

    public function chapters()
    {
        $this->ffprobe->clearArgument()->addArgument('show_chapters');

        return $this->getJson();
    }

    private function getJson()
    {
        $this->setFileArgument()->setPrintFormat('json')
                    ->prepare()
                    ->run();

        $json = json_decode($this->ffprobe->getOutput(), true);
        return $json;
    }

    private function setFileArgument()
    {
        return $this->ffprobe->addArgument($this->file, false);
    }
}
