<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlUpdateController extends Controller
{
    /**
     * Validate the request, then update the specified Url model belonging to the user.
     * Never update the user_id as a Url can not change owners.
     */
    public function update(Request $request): Url
    {
        // TODO validation

        $url = Url::where('user_id', $request->user_id)
            ->find($request->id);

        $url->original_url = $request->original_url;
        $url->shortened_url = $request->shortened_url;
        $url->redirect_url = $request->redirect_url;

        $url->save();

        return $url;
    }
}
