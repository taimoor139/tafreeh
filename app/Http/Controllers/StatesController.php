<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::with('country')->get();
        return view('states.index', compact('states'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::active()->get();
        return view('states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'country_id' => 'required',
                'name' => 'required'
            ]);

            $state = State::create($request->except('_token'));
            return redirect()->route('states.index')->with('success', 'state added sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $countries = Country::active()->get();
        return view('states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        try {
            $request->validate([
                'country_id' => 'required',
                'name' => 'required'
            ]);

            $state = $state->update([
                'country_id' => $request->country_id,
                'name' => $request->name,
                'is_active' => $request->is_active ?? 0
            ]);

            return redirect()->route('states.index')->with('success', 'State updated sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        try {
            $state->delete();
            return redirect()->route('states.index')->with('success', 'State deleted sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
