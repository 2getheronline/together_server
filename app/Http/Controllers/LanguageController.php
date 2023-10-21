<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public function index(){
        return Language::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Language $translation)
    {
        $req_lang = $translation->translations()
                    ->where('group', $request->group)
                    ->pluck('value', 'key');

        $fallback_lang = Language::where('language', config('app.fallback_locale'))
                    ->first()
                    ->translations()
                    ->where('group', $request->group)
                    ->whereNotIn('key', $req_lang->keys())
                    ->pluck('value', 'key');

        return $req_lang->merge($fallback_lang);
    }


}
