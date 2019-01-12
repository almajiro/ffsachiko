<?php

namespace Almajiro\FFSachiko\FFmpeg;

use Symfony\Component\Process\Process;

trait ProgressableTrait
{
    abstract protected function process(): Process;

    abstract protected function prepare();

    private $regex = '/^frame=(.*) fps=(.*[0-9]) q=(.*) size=(.*)kB time=(.*) bitrate=(.*)kbits\/s speed=(.*)x/';

    private function filterOutput($type, $buffer, $debug = false)
    {
        if ($debug) {
            if (Process::ERR === $type) {
                echo 'ERR > '.$buffer;
            } else {
                echo 'OUT > '.$buffer;
            }
        }

        if (Process::ERR === $type) {
            if (preg_match($this->regex, $buffer, $matches)) {
                $frame = trim($matches[1]);
                $fps = trim($matches[2]);
                $q = trim($matches[3]);
                $size = trim($matches[4]);
                $time = trim($matches[5]);
                $bitrate = trim($matches[6]);
                $speed = trim($matches[7]);

                return compact('frame', 'fps', 'q', 'size', 'time', 'bitrate', 'speed');
            }
        }
    }

    public function convertAndProgress(callable $callback, bool $debug = false)
    {
        $this->prepare();
        $self = $this;

        $this->process()->run(function ($type, $buffer) use (&$self, $callback, $debug) {
            $progress = $self->filterOutput($type, $buffer, $debug);

            if (is_array($progress)) {
                $callback(
                    $progress['frame'],
                    $progress['fps'],
                    $progress['q'],
                    $progress['size'],
                    $progress['time'],
                    $progress['bitrate'],
                    $progress['speed']
                );
            }
        });
    }
}
