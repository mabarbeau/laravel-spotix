<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spot;
use App\Http\Requests\StoreSpot;

class Spots extends Controller
{
    protected function index()
    {
      return view('spots.index', ['spots' => $spots = Spot::all() ]);
    }

    protected function create()
    {
      $spot = new Spot;

      return view('spots.edit', compact('spot'));
    }

    protected function store(StoreSpot $request)
    {
      $save = $request->all();

      // Hardcoded defaults
      $save['votes'] = 0;
      $save['hearts']= 0;
      $save['rating'] = null;

      //TODO: Get creator id
      $save['creator_id'] = 1;
      $save['updater_id'] = 10;
      // var_dump($save);

      Spot::create($save);

      return redirect('spots');
    }

    protected function show($slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      return view('spots.show', compact('spot'));
    }

    protected function edit($slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();

      return view('spots.edit', compact('spot') );
    }

    public function update(StoreSpot $request, $slug)
    {
      $spot = Spot::where('slug', $slug)->firstOrFail();
      foreach ($request as $key => $value) {
        $spot[$key] = $request[$key];
      }
      $spot['updater_id'] = 10;

      $spot->save();
    }

    public function destroy($slug)
    {
        $deletedRows = Spot::where('slug', $slug)->delete();
    }

}
