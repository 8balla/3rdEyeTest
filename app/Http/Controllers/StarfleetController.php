<?php

namespace App\Http\Controllers;

use App\Models\Starfleet;
use App\Models\Armament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StarfleetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Armament  $armament
     * @param  \App\Starfleet  $starfleet
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $starfleet = Starfleet::latest()->get();
        $armament = Armament::latest()->get();
        $starfleets = DB::select('select * from starfleets');
        $armaments = DB::select('select * from armaments');
        foreach ($armaments as $fleet) {
            $armour = $fleet;
            $obj_id = $fleet->obj_id;
        }
        foreach ($starfleets as $fleet) {
            $name = $fleet->name;
        }
        return view('starfleet.index', compact('starfleet', 'armament', 'armour',  'obj_id', 'name' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('starfleet.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Models\Armament  $armament
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'obj' => 'int|max:100',
            'name' => 'min:1|max:255',
            'crew' => 'min:1|max:255',
            'class' => 'min:1|max:255',
            'model' => 'min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'value' => 'min:1|max:255',
            'status' => 'min:1|max:255',

        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $starfleetImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $starfleetImage);
            $input['image'] = "$starfleetImage";
        }
        Starfleet::create($input);
        $request->validate([
            'obj_id' => 'int|max:100',
            'title' => 'min:1|max:255',
            'qty' => 'min:1|max:255',
        ]);
        $input = $request->all();
        Armament::create($input);
        return redirect()->route('fleet.index')
            ->with('success', 'Starship created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Starfleet  $starfleet
     * @return \Illuminate\Http\Response
     */
    public function show(Starfleet $starfleet, $id)
    {
        $starfleet = Starfleet::all($id);
        return view('starfleet.show', compact('starfleet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Starfleet  $starfleet
     * @return \Illuminate\Http\Response
     */
    public function edit(Starfleet $starfleet, $id)
    {
        return view('starfleet.edit', compact($starfleet));
    }


    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Models\Starfleet  $starfleet
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Starfleet $starfleet)
    {
        $request->validate([
            'obj' => 'int|max:100',
            'name' => 'min:1|max:255',
            'crew' => 'min:1|max:255',
            'class' => 'min:1|max:255',
            'model' => 'min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'value' => 'min:1|max:255',
            'status' => 'min:1|max:255',

        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $starfleetImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $starfleetImage);
            $input['image'] = "$starfleetImage";
        }
        Starfleet::edit($input);
        $request->validate([
            'obj_id' => 'int|max:100',
            'title' => 'min:1|max:255',
            'qty' => 'min:1|max:255',
        ]);
        $input = $request->all();
        Armament::edit($input);
        $request->update($request->all());

        return redirect()->route('fleet.index')
            ->with('success', 'Starship updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Starfleet  $starfleet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Starfleet $starfleet, $id)
    {
        $starfleet->destroy($id);
        return redirect()->route('fleet.index')
            ->with('success', 'Starship deleted successfully');
    }
}
