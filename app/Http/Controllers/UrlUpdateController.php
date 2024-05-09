<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;

class UrlUpdateController extends Controller
{
    /**
     * Validate the request, then update the specified Url model belonging to the user.
     * Never update the user_id as a Url can not change owners.
     */
    public function update(UrlRequest $request): Url
    {
        $url = Url::where('user_id', $request->user_id)
            ->findOrFail($request->id);

        $validated = $request->validated();

        $url->original_url = $validated['original_url'];
        $url->shortened_url = $validated['shortened_url'];
        $url->redirect_url = $validated['redirect_url'];

        $url->save();

        return $url;
    }
}
