<?php

namespace Almajiro\FFSachiko\FFmpeg;

use Almajiro\FFSachiko\FFMpeg;
use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\Parameters\Input;
use Almajiro\FFSachiko\FFmpeg\ProgressableTrait;
use Symfony\Component\Process\Process;

class File
{
    use ProgressableTrait;

    private $file;

    private $ffmpeg;

    private $parameters = [];

    private $save = null;

    public function __construct(
        Input $file,
        FFmpeg $ffmpeg
    ) {
        $this->file = $file;
        $this->ffmpeg = $ffmpeg;
    }

    public function addParameter(AbstractParameter $parameter)
    {
        $this->parameters[] = $parameter;
    }

    public function saveAs(string $file)
    {
        $this->save = $file;
        return $this;
    }

    public function convert()
    {
        $this->prepare();
        $this->ffmpeg->run();
    }

    protected function prepare()
    {
        if (is_null($this->save)) {
            //
        }

        $this->clearArgument();

        foreach ($this->parameters as $parameter) {
            foreach ($parameter->getParameters() as $option) {
                $this->ffmpeg->addArgument($option, false);
            }
        }

        $this->ffmpeg->addArgument($this->save, false);

        $this->ffmpeg->prepare();
    }

    private function clearArgument()
    {
        $this->ffmpeg->clearArgument();

        foreach ($this->file->getParameters() as $option) {
            $this->ffmpeg->addArgument($option, false);
        }
    }

    protected function process(): Process
    {
        return $this->ffmpeg->process();
    }
}
