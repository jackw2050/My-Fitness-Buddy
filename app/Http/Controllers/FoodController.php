<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Food;
use App\Meal;
use Auth;

class FoodController extends Controller
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
        return view('food', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meals = Auth::user()->meals;
        return view('food', compact('meals'));
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
            'meal_id' => 'required|integer|exists:meals,id',
            'food_name' => 'required|string|max:255',
            'protein' => 'required|numeric|min:0',
            'carbs' => 'required|numeric|min:0',
            'fat' => 'required|numeric|min:0',
        ]);

        // Verify the meal belongs to the authenticated user
        $meal = Meal::where('id', $request->meal_id)
                    ->where('user_id', Auth::user()->id)
                    ->firstOrFail();

        Food::create([
            'meal_id' => $meal->id,
            'food_name' => $request->food_name,
            'protein' => $request->protein,
            'carbs' => $request->carbs,
            'fat' => $request->fat,
        ]);

        return redirect('/food')->with('status', 'Food item added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::findOrFail($id);

        // Verify ownership through the meal's user_id
        if ($food->meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        return view('food_show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);

        if ($food->meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $meals = Auth::user()->meals;
        return view('food_edit', compact('food', 'meals'));
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
            'meal_id' => 'required|integer|exists:meals,id',
            'food_name' => 'required|string|max:255',
            'protein' => 'required|numeric|min:0',
            'carbs' => 'required|numeric|min:0',
            'fat' => 'required|numeric|min:0',
        ]);

        $food = Food::findOrFail($id);

        if ($food->meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        // Verify the target meal also belongs to the user
        $meal = Meal::where('id', $request->meal_id)
                    ->where('user_id', Auth::user()->id)
                    ->firstOrFail();

        $food->update([
            'meal_id' => $meal->id,
            'food_name' => $request->food_name,
            'protein' => $request->protein,
            'carbs' => $request->carbs,
            'fat' => $request->fat,
        ]);

        return redirect('/food')->with('status', 'Food item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        if ($food->meal->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $food->delete();

        return redirect('/food')->with('status', 'Food item deleted successfully!');
    }
}
