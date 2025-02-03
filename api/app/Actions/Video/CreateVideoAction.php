<?php

namespace App\Actions\Video;

use App\Models\Video;

class CreateVideoAction
{
    public function execute(array $data): Video
    {
        $video = app(Video::class)->create($data);

        if (!empty($data['image'])) {
            $video->addMedia($data['image'])
                ->usingFileName("video-image-{$video->id}.png")
                ->toMediaCollection('video_images');
        }

        if (!empty($data['video'])) {
            $video->addMedia($data['video'])
                ->usingFileName("video-{$video->id}.mp4")
                ->toMediaCollection('video_files');
        }

        return $video;
    }
}
