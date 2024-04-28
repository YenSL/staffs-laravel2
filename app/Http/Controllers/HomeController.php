<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard
     * 
     * @return  \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin == 1){
            return redirect()->route('user.order');
        }
        $orders = Order::latest()->where('user_id',auth()->user()->id)->get();
        return view('home',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
         //
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
       //

    }

    //Add the Chirp to Favourites
    public function addToFavourites()
    {
        //
   }

      //Show the Chirps in Favourites
    public function favourites()  
    {
       //
   }


}