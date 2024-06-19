<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\District;
use App\Models\Point;
use App\Models\State;
use App\Models\Town;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = Point::with('state', 'district', 'country', 'town')->get();
        return view('points.index', compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::active()->get();
        $states = State::active()->get();
        $towns = Town::active()->get();
        $districts = District::active()->get();

        return view('points.create', compact('countries', 'states', 'towns', 'districts'));
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
                'town_id' => 'required',
                'name' => 'required'
            ]);

            $point = Point::create($request->except('_token'));
            return redirect()->route('points.index')->with('success', 'point added sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point)
    {
        $countries = Country::active()->get();
        $states = State::active()->get();
        $towns = Town::active()->get();
        $districts = District::active()->get();

        return view('points.edit', compact('point', 'countries', 'states', 'towns', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Point $point)
    {
        try {
            $request->validate([
                'country_id' => 'required',
                'state_id' => 'required',
                'district_id' => 'required',
                'town_id' => 'required',
                'name' => 'required'
            ]);

            $point->update([
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'town_id' => $request->town_id,
                'district_id' => $request->district_id,
                'name' => $request->name,
                'is_active' => $request->is_active ?? 0
            ]);

            return redirect()->route('points.index')->with('success', 'Point updated sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point)
    {
        try {
            $point->delete();
            return redirect()->route('points.index')->with('success', 'Point deleted sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
