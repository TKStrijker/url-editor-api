<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;

class UrlStoreController extends Controller
{
    /**
     * Validate the request, then store a new Url model based on the request.
     */
    public function store(UrlRequest $request): Url
    {
        $validated = $request->validated();

        $url = new Url();

        $url->original_url = $validated['original_url'];
        $url->shortened_url = $validated['shortened_url'];
        $url->redirect_url = $validated['redirect_url'];
        $url->user()->associate($validated['user_id']);

        $url->save();

        return $url;
    }
}
