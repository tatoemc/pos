<?php

namespace App\Http\Controllers;

use App\Mouncerfatcat;
use Illuminate\Http\Request;

class MouncercatfatController extends Controller
{
   
    public function index()
    {
        // 
         $mouncerfatcats = Mouncerfatcat::orderBy('id', 'desc')->paginate(8);
        //return view and pass in the variable
        return view ('mouncerfatcats.index', compact('mouncerfatcats'));
    }

    public function create()
    {
        //
        return view ('mouncerfatcats.create');
    }

    public function store(Request $request)
    {
        //
         $request->validate([
            'name' => 'required'
        ]);

        $request_data = $request->all();

        Mouncerfatcat::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('mouncerfatcats.index');
    }

   
    public function edit(Mouncerfatcat $mouncerfatcat)
    {
        //
        return view('mouncerfatcats.edit', compact('mouncerfatcat'));
    }

    
    public function update(Request $request, Mouncerfatcat $mouncerfatcat)
    {
        //
         $request->validate([
            'name' => 'required',
        ]);
 
        $request_data = $request->all();

        $mouncerfatcat->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('mouncerfatcats.index');
    }

   
    public function destroy(Mouncerfatcat $mouncerfatcat)
    {
        //
         $mouncerfatcat->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('mouncerfatcats.index');
    }
}
