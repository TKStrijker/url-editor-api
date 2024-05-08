<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlStoreController extends Controller
{
    /**
     * Validate the request, then store a new Url model based on the request.
     */
    public function store(Request $request): Url
    {
        // TODO validation

        $url = new Url();

        $url->original_url = $request->original_url;
        $url->shortened_url = $request->shortened_url;
        $url->redirect_url = $request->redirect_url;
        $url->user()->associate($request->user_id);

        $url->save();

        return $url;
    }
}
