<?php

namespace App\Http\Controllers;

use App\Mouncerfatitem;
use App\Mouncerfatcat;
use Illuminate\Http\Request;
use File;


class MouncerfatitemController extends Controller
{
   
    public function index()
    {
         
         $mouncerfatitems = Mouncerfatitem::orderBy('id', 'desc')->latest()->paginate(5);
        //return view and pass in the variable
        return view ('mouncerfatitems.index', compact('mouncerfatitems'));
    }

   
    public function create()
    {
        //
        $mouncerfatcats = Mouncerfatcat::all();
        return view ('mouncerfatitems.create',compact('mouncerfatcats'));
    }

   
    public function store(Request $request)
    {
        //dd( $request->all());
        $request->validate([
            'name' => 'required',
            'mouncerfatcat_id' => 'required',
            'amount' => 'required',
            'note'  => 'required'
        ]);

         
        $mouncerfatitem = new Mouncerfatitem; 

        $mouncerfatitem->name = $request->name;
        $mouncerfatitem->mouncerfatcat_id = $request->mouncerfatcat_id;
        $mouncerfatitem->amount = $request->amount;
        $mouncerfatitem->note = $request->note;

        
        
        
        $mouncerfatitem->save();
         

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('mouncerfatitems.index');
    }

   
    public function edit(Mouncerfatitem $mouncerfatitem)
    {
        //
        $mouncerfatcats = Mouncerfatcat::all();
        return view('mouncerfatitems.edit', compact('mouncerfatitem','mouncerfatcats'));
    }

   
    public function update(Request $request, Mouncerfatitem $mouncerfatitem)
    {
        //
         $this->validate($request , array(
            'name' => 'required',
            'mouncerfatcat_id' => 'required',
            'amount' => 'required',
            'note'  => 'required'
        ));

        //save the data to the data base 
        $mouncerfatitem = Mouncerfatitem::find($mouncerfatitem->id);
        $mouncerfatitem->name = $request->input('name');
        $mouncerfatitem->mouncerfatcat_id = $request->input('mouncerfatcat_id');
        $mouncerfatitem->amount = $request->input('amount');
        $mouncerfatitem->note = $request->input('note');
        

        $mouncerfatitem->save();
       
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('mouncerfatitems.index');
      
    }

   
    public function destroy(Mouncerfatitem $mouncerfatitem)
    {
         $mouncerfatitem->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('mouncerfatitems.index');
    }
}
