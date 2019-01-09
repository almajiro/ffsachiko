<?php

namespace Almajiro\FFSachiko;

use Almajiro\FFSachiko\AbstractExecutable;
use Almajiro\FFSachiko\FFprobe\File;

class FFprobe extends AbstractExecutable
{
    public function __construct(
        string $ffmpegBinary = '/usr/bin/ffmpeg'
    ) {
        $this->setCommand($ffmpegBinary);
        $this->setPrefix('-');
    }

    public function getVersion()
    {
        $this->clearArgument()->setArgument(['version']);
        $this->prepare()->run();

        return $this->getOutput();
    }

    public function getLicense()
    {
        $this->clearArgument()->setArgument(['L']);
        $this->prepare()->run();

        return $this->getOutput();
    }

    public function setPrintFormat(string $format)
    {
        $this->addArgument('print_format');
        $this->addArgument('json', false);

        return $this;
    }

    public function open(string $file): File
    {
        return new File($file, $this);
    }
}
