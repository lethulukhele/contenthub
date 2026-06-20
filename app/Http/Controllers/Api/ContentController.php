<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::published()->get();
        return response()->json($contents);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content_type_id' => 'required|exists:content_types,id',
            'title' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|in:draft,published'
        ]);

        $content = Content::create($validated);
        return response()->json($content, 201);
    }

    public function show(Content $content)
    {
        return response()->json($content);
    }

    public function update(Request $request, Content $content)
    {
        $content->update($request->all());
        return response()->json($content);
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return response()->json(null, 204);
    }
}
