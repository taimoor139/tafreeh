<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Town;
use Illuminate\Http\Request;

class TownsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $towns = Town::with('state', 'country', 'district')->get();
        return view('towns.index', compact('towns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::active()->get();
        $states = State::active()->get();
        $districts = District::active()->get();

        return view('towns.create', compact('countries', 'states', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'country_id' => 'required',
                'state_id' => 'required',
                'district_id' => 'required',
                'name' => 'required'
            ]);

            $town = Town::create($request->except('_token'));
            return redirect()->route('towns.index')->with('success', 'Town added sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Town $town)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Town $town)
    {
        $countries = Country::active()->get();
        $states = State::active()->get();
        $districts = District::active()->get();

        return view('towns.edit', compact('town', 'districts', 'countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Town $town)
    {
        try {
            $request->validate([
                'country_id' => 'required',
                'state_id' => 'required',
                'district_id' => 'required',
                'name' => 'required'
            ]);

            $state = $town->update([
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'district_id' => $request->district_id,
                'name' => $request->name,
                'is_active' => $request->is_active ?? 0
            ]);

            return redirect()->route('towns.index')->with('success', 'Town updated sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Town $town)
    {
        try {
            $town->delete();
            return redirect()->route('towns.index')->with('success', 'Town deleted sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
