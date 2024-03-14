<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DishesController extends Controller
{
    function index()
    {
        session()->forget('cart');
        $filePath = public_path('dishes.json');

        $jsonData = file_get_contents($filePath);


        $dishes  = json_decode($jsonData, true);
        $meals = [];

        foreach ($dishes['dishes'] as $dish) {
            foreach ($dish['availableMeals'] as $meal) {
                if (!in_array($meal, $meals)) {
                    $meals[] = $meal;
                }
            }
        }
        return view('index', compact('meals'));
    }
    function getRestaurant(Request $request)
    {
        $filePath = public_path('dishes.json');

        $jsonData = file_get_contents($filePath);


        $dishes  = json_decode($jsonData, true);
        $meal = $request->input('meal');
        $restaurants = array_unique(array_column(array_filter($dishes['dishes'], function ($dish) use ($meal) {
            return in_array($meal, $dish['availableMeals']);
        }), 'restaurant'));
        return response()->json($restaurants);
    }
    function getDishes(Request $request)
    {
        session()->forget('cart');
        $filePath = public_path('dishes.json');

        $jsonData = file_get_contents($filePath);


        $dishes  = json_decode($jsonData, true);

        $meal = $request->input('meal');
        $restaurant = $request->input('restaurant');
        $filteredDishes = array_filter($dishes['dishes'], function ($dish) use ($meal, $restaurant) {
            return in_array($meal, $dish['availableMeals']) && $dish['restaurant'] == $restaurant;
        });

        // Lấy ra tên của các món ăn
        $dishNames = array_column($filteredDishes, 'name');
        return response()->json($dishNames);
    }
    function addDishes(Request $request)
    {
        $name = $request->input('dishes');
        $quantity = $request->input('qty');

        $cart = Session::get('cart', []);

        if (array_key_exists($name, $cart)) {
            $cart[$name] += $quantity;
        } else {
            $cart[$name] = $quantity;
        }
        Session::put('cart', $cart);
       
        return response()->json($cart);
    }
    function getResult(Request $request)
    {
        $cart = Session::get('cart', []);
        return response()->json($cart);
    }
}
