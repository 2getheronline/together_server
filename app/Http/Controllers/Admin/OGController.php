<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use shweshi\OpenGraph\Facades\OpenGraphFacade;

class OGController extends Controller
{
    public function fetchMeta(Request $request)
    {
        $url = $request->url;

        if (Str::contains($url, "youtu")) {
            try {
                return json_decode(file_get_contents("https://www.youtube.com/oembed?url=" . $url["url"] . "&format=json"));
            } catch (\Throwable $e) {}
        } else {
            return OpenGraphFacade::fetch($url, true);
        }

    }
}
