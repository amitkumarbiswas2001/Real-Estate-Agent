<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPropertyCommentRequest;
use App\Http\Requests\StorePropertyCommentRequest;
use App\Http\Requests\UpdatePropertyCommentRequest;
use App\Models\PropertyComment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyCommentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('property_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyComments = PropertyComment::all();

        return view('frontend.propertyComments.index', compact('propertyComments'));
    }

    public function create()
    {
        abort_if(Gate::denies('property_comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.propertyComments.create', compact('users'));
    }

    public function store(StorePropertyCommentRequest $request)
    {
        $propertyComment = PropertyComment::create($request->all());

        return redirect()->route('frontend.property-comments.index');
    }

    public function edit(PropertyComment $propertyComment)
    {
        abort_if(Gate::denies('property_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $propertyComment->load('user');

        return view('frontend.propertyComments.edit', compact('users', 'propertyComment'));
    }

    public function update(UpdatePropertyCommentRequest $request, PropertyComment $propertyComment)
    {
        $propertyComment->update($request->all());

        return redirect()->route('frontend.property-comments.index');
    }

    public function show(PropertyComment $propertyComment)
    {
        abort_if(Gate::denies('property_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyComment->load('user');

        return view('frontend.propertyComments.show', compact('propertyComment'));
    }

    public function destroy(PropertyComment $propertyComment)
    {
        abort_if(Gate::denies('property_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertyCommentRequest $request)
    {
        PropertyComment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
