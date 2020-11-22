<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyCommentRequest;
use App\Http\Requests\UpdatePropertyCommentRequest;
use App\Http\Resources\Admin\PropertyCommentResource;
use App\Models\PropertyComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyCommentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('property_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyCommentResource(PropertyComment::with(['user'])->get());
    }

    public function store(StorePropertyCommentRequest $request)
    {
        $propertyComment = PropertyComment::create($request->all());

        return (new PropertyCommentResource($propertyComment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PropertyComment $propertyComment)
    {
        abort_if(Gate::denies('property_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyCommentResource($propertyComment->load(['user']));
    }

    public function update(UpdatePropertyCommentRequest $request, PropertyComment $propertyComment)
    {
        $propertyComment->update($request->all());

        return (new PropertyCommentResource($propertyComment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PropertyComment $propertyComment)
    {
        abort_if(Gate::denies('property_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyComment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
