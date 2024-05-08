<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UrlIndexController extends Controller
{
    public function index(Request $request): Collection
    {
        $urls = Url::where('user_id', $request->user_id)
            ->get();

        return $urls;
    }
}
