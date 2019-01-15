<p align="center">
  <img src="https://raw.github.com/wiki/almajiro/ffsachiko/images/ffsachiko.jpg">
</p>
<p align="center">
  <img src="https://travis-ci.org/almajiro/ffsachiko.svg?branch=master">
</p>

FFSachiko
===
The simplest FFmpeg/FFprobe wrapper.

## Install (coming soon)
```
composer required almajiro/ffsachiko
```

## Example
```
use Almajiro\FFSachiko\FFmpeg;
use Almajiro\FFSachiko\FFmpeg\Parameters\Input;
use Almajiro\FFSachiko\FFmpeg\Parameters\Threads;
use Almajiro\FFSachiko\FFmpeg\Parameters\VideoFilters;
use Almajiro\FFSachiko\FFmpeg\Parameters\VideoFilters\Scale;

$file = '~/videos/owarimonogatari.mp4';

$ffmpeg = new FFmpeg('/usr/local/bin/ffmpeg');

$file = $ffmpeg->open(new Input($file));

// Define how many core want to use
$file->addParameter(new Threads(4));

// Declare new VideoFilters class
$videoFilter = new VideoFilters();

// Resize video size to 640x320
$videoFilter->addFilter(new Scale(640, 320));

$file->addParameter($videoFilter);
$file->saveAs('output/video.mp4')->convert();
```

## Contribution
1. Fork it ( http://github.com/almajiro/ffsachiko )
2. Create your feature branch (git checkout -b my-new-feature)
3. Commit your changes (git commit -am 'Add some feature')
4. Push to the branch (git push origin my-new-feature)
5. Create new Pull Request

## Author
[almajiro](https://github.com/almajiro)
