<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlDestroyController extends Controller
{
    /**
     * Delete the specified Url model. 
     * Return the Url's ID so you know what element to
     * remove from the index list in the frontend. 
     */
    public function delete(Request $request): int
    {
        $url = Url::where('user_id', $request->user_id)
            ->find(1);

        $url->delete();

        return $url->id;
    }
}
