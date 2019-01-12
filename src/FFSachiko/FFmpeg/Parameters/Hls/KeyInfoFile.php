<?php

namespace Almajiro\FFSachiko\FFmpeg\Parameters\Hls;

use Almajiro\FFSachiko\FFmpeg\AbstractParameter;
use Almajiro\FFSachiko\FFmpeg\ParameterInterface;
use Almajiro\FFSachiko\Exceptions\InvalidArgumentException;

class KeyInfoFile extends AbstractParameter implements ParameterInterface
{
    private $keyFile;

    public function __construct(string $keyFile)
    {
        $this->setFile($keyFile);
    }

    public function setFile(string $file)
    {
        if (!file_exists($file)) {
            throw new InvalidArgumentException(sprintf('Unable to open %s', $file));
        }

        $this->keyFile = $file;
        return $this;
    }

    public function getFile(): string
    {
        return $this->keyFile;
    }

    public function getParameters(): array
    {
        return array('-hls_key_info_file', $this->keyFile);
    }
}
