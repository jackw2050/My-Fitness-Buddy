<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Meal;
use Auth;

class MealController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Auth::user()->meals;
        return view('meal', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        Meal::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/meal')->with('status', 'Meal created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::findOrFail($id);

        if ($meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        return view('meal_show', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::findOrFail($id);

        if ($meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        return view('meal_edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $meal = Meal::findOrFail($id);

        if ($meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $meal->update([
            'name' => $request->name,
        ]);

        return redirect('/meal')->with('status', 'Meal updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);

        if ($meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $meal->delete();

        return redirect('/meal')->with('status', 'Meal deleted successfully!');
    }
}
