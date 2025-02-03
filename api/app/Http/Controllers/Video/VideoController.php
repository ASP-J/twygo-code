<?php

namespace App\Http\Controllers\Video;

use App\Actions\Video\CreateVideoAction;
use App\Actions\Video\DeleteVideoAction;
use App\Actions\Video\UpdateVideoAction;
use App\Data\Video\VideoData;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Spatie\QueryBuilder\AllowedFilter;

class VideoController extends Controller
{
    public function index()
    {
        return pagination(Video::class)
            ->allowedFilters([
                AllowedFilter::partial('title'),
            ])
            ->allowedSorts(['title', 'created_at'])
            ->defaultSort('created_at')
            ->resource(VideoResource::class);
    }

    public function show(Video $video)
    {
        return response()->json(VideoResource::make($video), 200);
    }

    public function store(VideoRequest $request)
    {
        $validatedData = $request->validated();

        $video = app(CreateVideoAction::class)
            ->execute($validatedData);

        return response()->json(VideoResource::make($video), 201);
    }

    public function update(VideoRequest $request, Video $video)
    {
        $validatedData = $request->validated();

        $video = app(UpdateVideoAction::class)
            ->execute($video, $validatedData);

        return response()->json(VideoResource::make($video), 200);
    }

    public function destroy(Video $video)
    {
        app(DeleteVideoAction::class)
            ->execute($video);

        return response()->noContent();
    }
}
