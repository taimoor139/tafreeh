<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::with('state', 'state.country')->get();
        return view('districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::active()->get();
        $states = State::active()->get();

        return view('districts.create', compact('countries', 'states'));
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
                'name' => 'required'
            ]);

            $district = District::create($request->except('_token'));
            return redirect()->route('districts.index')->with('success', 'district added sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        $countries = Country::active()->get();
        $states = State::active()->get();

        return view('districts.edit', compact('district', 'countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        try {
            $request->validate([
                'country_id' => 'required',
                'state_id' => 'required',
                'name' => 'required'
            ]);

            $state = $district->update([
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'name' => $request->name,
                'is_active' => $request->is_active ?? 0
            ]);

            return redirect()->route('districts.index')->with('success', 'District updated sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        try {
            $district->delete();
            return redirect()->route('districts.index')->with('success', 'District deleted sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
