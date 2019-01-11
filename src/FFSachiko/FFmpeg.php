<?php

namespace Almajiro\FFSachiko;

use Almajiro\FFSachiko\AbstractExecutable;
use Almajiro\FFSachiko\FFmpeg\File;
use Almajiro\FFSachiko\FFmpeg\Parameters\Input;

class FFMpeg extends AbstractExecutable
{
    public function __construct(
        $ffmpegBinary = '/usr/bin/ffmpeg'
    ) {
        $this->setCommand($ffmpegBinary);
        $this->setPrefix('--');
    }

    public function open(Input $file)
    {
        return new File($file, $this);
    }
}
