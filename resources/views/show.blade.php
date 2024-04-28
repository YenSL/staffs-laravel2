@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Make Your Order</div>
                <div class="card-body">
                    @if (Auth::check())
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        <div class="user-info mb-3">
                            <h5 class="mb-2">User Information</h5>
                            <p>Name: <strong>{{ auth()->user()->name }}</strong></p>
                            <p>Email: <strong>{{ auth()->user()->email }}</strong></p>
                            <p>Phone number: <input type="number" class="form-control" name="phone" required></p>
                        </div>
                        <div class="pizza-sizes mb-3">
                            <p>Small Pizza quantity:</p>
                            <input type="number" class="form-control mb-3" name="small_pizza" value="0">
                            <p>Medium Pizza quantity:</p>
                            <input type="number" class="form-control mb-3" name="medium_pizza" value="0">
                            <p>Large Pizza quantity:</p>
                            <input type="number" class="form-control mb-3" name="large_pizza" value="0">
                        </div>
                        <div class="toppings mb-3">
                            <p>Topping : Vegan Cheese £0.85</p>
                            <input type="number" class="form-control mb-3" name="v_cheese" placeholder="Vegan Cheese" value="0" required>
                            <p>Topping : Pineapple £0.85</p>
                            <input type="number" class="form-control mb-3" name="pineapple" placeholder="Pineapple" value="0" required>
                            <p>Topping : Salami £0.85</p>
                            <input type="number" class="form-control mb-3" name="salami" placeholder="Salami" value="0" required>
                            <p>Topping : Olives £0.85</p>
                            <input type="number" class="form-control mb-3" name="olives" placeholder="Olives" value="0" required>
                            <p>Topping : Spicy beef £0.85</p>
                            <input type="number" class="form-control mb-3" name="s_beef" placeholder="Spicy beef" value="0" required>
                            <p>Topping : Hot dog £0.85</p>
                            <input type="number" class="form-control mb-3" name="hotdog" placeholder="Hot dog" value="0" required>
                        </div>

                        <div class="delivery mb-3">
                            <p>Delivery(1) or Collection(0)</p>
                            <input type="number" class="form-control mb-3" name="delivery" placeholder="Delivery(1) or Collection(0)" value="0" required>
                        </div>
<!--
                        <div class="delivery-option mb-3">
                            <h5 class="mb-2">Delivery or Collection</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_option" id="delivery" value="delivery" checked>
                                <label class="form-check-label" for="delivery">
                                    Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_option" id="collection" value="collection">
                                <label class="form-check-label" for="collection">
                                    Collection
                                </label>
                            </div>
                        </div>
-->
                            <!-- Add other toppings similarly -->
                        </div>
                        <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                        <p>Date: <input type="date" name="date" class="form-control" required></p>
                        <p>Time: <input type="time" name="time" class="form-control" required></p>
                        <p>Message: <textarea class="form-control" name="body" required></textarea></p>
                        <button class="btn btn-success w-100 mt-3" type="submit">Place Order</button>
                    </form>
                    @if (session('message'))
                        <div class="alert alert-success mt-3">{{ session('message') }}</div>
                    @endif
                    @if (session('errmessage'))
                        <div class="alert alert-danger mt-3">{{ session('errmessage') }}</div>
                    @endif
                    @else
                    <p>Please <a href="/login" class="text-primary">log in</a> to make an order.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Pizza Details</div>
                <div class="card-body text-center">
                    <img src="{{Storage::url($pizza->image)}}" class="img-fluid rounded mb-3" alt="Pizza Image">
                    <h3>{{ $pizza->name }}</h3>
                    <p>{{ $pizza->description }}</p>
                    <p class="lead">Small pizza price: £{{ $pizza->small_pizza_price }}</p>
                    <p class="lead">Medium pizza price: £{{ $pizza->medium_pizza_price }}</p>
                    <p class="lead">Large pizza price: £{{ $pizza->large_pizza_price }}</p>
                    <p class="lead">Delivery cost: £{{ $pizza->delivery_price }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .bg-primary {
        background-color: #007bff !important;
    }
    .text-primary {
        color: #007bff !important;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    .shadow {
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
    }
    .card-header {
        font-size: 1.25rem;
    }
    .card-body img {
        max-width: 80%; /* Better control for different screen sizes */
    }
    .form-check-label {
        margin-left: 5px; /* Improved spacing for readability */
    }
</style>
@endsection
