<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HeroController extends Controller
{
    //
    public function index() {
        
        $heroes = Hero::orderBy('name', 'ASC')->get();

        $view = view('index', [
            'heroes' => $heroes,
        ]);
        return $view;
    }

    public function show($hero_slug)
    {
        $hero = Hero::where('slug', $hero_slug)->first();

        if (!$hero) {
            abort(404, 'Hero not found');
        }

        $view = view('hero/show');
        $view->hero = $hero;
        return $view;
    }

    public function store(Request $request) {
        $emergency = new \App\Emergency;

        $emergency->fill($request->only(['subject','description']));

        $emergency->save();

    }

}
