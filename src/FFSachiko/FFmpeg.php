<?php

namespace FFSachiko;

use Almajiro\FFSachiko\AbtractExecutable;

class FFMpeg extends AbstractExecutable
{
    public function __construct(
        $ffmpegBinary = '/usr/bin/ffmpeg'
    ) {
        $this->setCommand($ffmpegBinary);
        $this->setPrefix('--');
    }
}