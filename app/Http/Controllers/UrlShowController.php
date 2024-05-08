<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlShowController extends Controller
{
    /**
     * Return a Url model with the specified ID belonging to the specified User.
     */
    public function show(Request $request): Url
    {
        $url = Url::where('user_id', $request->user_id)
            ->find($request->id);

        return $url;
    }
}
