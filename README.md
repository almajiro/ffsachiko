<p align="center">
  <img src="https://raw.github.com/wiki/almajiro/ffsachiko/images/ffsachiko.jpg">
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
use Almajiro\FFSachiko\FFprobe;

$ffprobe = new FFprobe('/usr/local/bin/ffprobe);
$file = $ffprobe->open('~/Downloads/gochiusa_op.mp4');

print_r($file->streams());

Array
(
    [0] => Array
        (
            [index] => 0
            [codec_name] => h264
            [codec_long_name] => H.264 / AVC / MPEG-4 AVC / MPEG-4 part 10
            [profile] => High
            [codec_type] => video
            [codec_time_base] => 8192999/491760000
            [codec_tag_string] => avc1
            [codec_tag] => 0x31637661
            [width] => 3840
            [height] => 2160
            [coded_width] => 3840
            [coded_height] => 2160
            [has_b_frames] => 1
            [sample_aspect_ratio] => 1:1
            [display_aspect_ratio] => 16:9
            [pix_fmt] => yuv420p
            [level] => 51
            [color_range] => tv
            [color_space] => bt709
            [color_transfer] => bt709
            [color_primaries] => bt709
            [chroma_location] => left
            [refs] => 1
            [is_avc] => true
            [nal_length_size] => 4
            [r_frame_rate] => 30/1
            [avg_frame_rate] => 245880000/8192999
            [time_base] => 1/90000
            [start_pts] => 0
            [start_time] => 0.000000
            [duration_ts] => 8193060
            [duration] => 91.034000
            [bit_rate] => 12423072
            [bits_per_raw_sample] => 8
            [nb_frames] => 2732
            [disposition] => Array
                (
                    [default] => 1
                    [dub] => 0
                    [original] => 0
                    [comment] => 0
                    [lyrics] => 0
                    [karaoke] => 0
                    [forced] => 0
                    [hearing_impaired] => 0
                    [visual_impaired] => 0
                    [clean_effects] => 0
                    [attached_pic] => 0
                    [timed_thumbnails] => 0
                )

            [tags] => Array
                (
                    [language] => und
                    [handler_name] => VideoHandler
                )

        )

    [1] => Array
        (
            [index] => 1
            [codec_name] => aac
            [codec_long_name] => AAC (Advanced Audio Coding)
            [profile] => LC
            [codec_type] => audio
            [codec_time_base] => 1/44100
            [codec_tag_string] => mp4a
            [codec_tag] => 0x6134706d
            [sample_fmt] => fltp
            [sample_rate] => 44100
            [channels] => 2
            [channel_layout] => stereo
            [bits_per_sample] => 0
            [r_frame_rate] => 0/0
            [avg_frame_rate] => 0/0
            [time_base] => 1/44100
            [start_pts] => 0
            [start_time] => 0.000000
            [duration_ts] => 4022273
            [duration] => 91.208005
            [bit_rate] => 125588
            [max_bit_rate] => 125588
            [nb_frames] => 3928
            [disposition] => Array
                (
                    [default] => 1
                    [dub] => 0
                    [original] => 0
                    [comment] => 0
                    [lyrics] => 0
                    [karaoke] => 0
                    [forced] => 0
                    [hearing_impaired] => 0
                    [visual_impaired] => 0
                    [clean_effects] => 0
                    [attached_pic] => 0
                    [timed_thumbnails] => 0
                )

            [tags] => Array
                (
                    [language] => und
                    [handler_name] => SoundHandler
                )

        )

)
```

## Contribution
1. Fork it ( http://github.com/almajiro/ffsachiko )
2. Create your feature branch (git checkout -b my-new-feature)
3. Commit your changes (git commit -am 'Add some feature')
4. Push to the branch (git push origin my-new-feature)
5. Create new Pull Request

## お願い
これは僕の初めてのライブラリです。不細工なところもあるかもれませんが些細なことでも構わないのでご教授お願いします。

## Author
[almajiro](https://github.com/almajiro)
