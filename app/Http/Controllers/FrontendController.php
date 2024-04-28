<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $pizzas= Pizza::latest()->get();
        return view('frontpage', compact('pizzas'));
        //return view('frontpage');
    }

    public function show($id)
    {
        $pizza= Pizza::find($id);
        return view('show', compact('pizza'));
        //return view('frontpage');
    }

    public function store(Request $request)
    {
        if($request->small_pizza==0 && $request->medium_pizza==0 && $request->large_pizza==0){
            return back()->with('errmessage', 'Please order at least one pizza');
        }
        //dd($request->all());

        
        if ($request->small_pizza < 0 || $request->medium_pizza < 0 || $request->large_pizza < 0) {
            return back()->with('errmessage', 'Order should not have negative number');
        }

        Order::create([
            'time' => $request->time,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
            'v_cheese' => $request->v_cheese,
            'pineapple' => $request->pineapple,
            'salami' => $request->salami,
            'olives' => $request->olives,
            's_beef' => $request->s_beef,
            'hotdog' => $request->hotdog,
            'delivery' => $request->delivery,
            'body' => $request->body,
            'phone' => $request->phone
        ]);
        return back()->with('message', 'Your order was successfull');
        
    }

}
