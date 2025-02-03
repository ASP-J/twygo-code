<?php

namespace App\Actions\Video;

use App\Models\Video;

class UpdateVideoAction
{
    public function execute(Video $video, array $data): Video
    {
        tap($video)->update($data);

        if (!empty($data['image'])) {
            $video->clearMediaCollection('video_images');
            $video->addMedia($data['image'])
                ->usingFileName("video-image-{$video->id}.png")
                ->toMediaCollection('video_images');
        }

        if (!empty($data['video'])) {
            $video->clearMediaCollection('video_files');
            $video->addMedia($data['video'])
                ->usingFileName("video-{$video->id}.mp4")
                ->toMediaCollection('video_files');
        }

        return $video;
    }
}
