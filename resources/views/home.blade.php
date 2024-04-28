@extends('layouts.app')

This is a homepage

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">

                <div class="card">
                    <div class="card-header">My Order Basket
                       
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Phone/ Email</th>
                                    <th scope="col">Date/ Time</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">S.pizza</th>
                                    <th scope="col">M.pizza</th>
                                    <th scope="col">L.pizza</th>
                                    <th scope="col">v_cheese</th>
                                    <th scope="col">pineapple</th>
                                    <th scope="col">salami</th>
                                    <th scope="col">olives</th>
                                    <th scope="col">s_beef</th>
                                    <th scope="col">hotdog</th>
                                    <th scope="col">Delivery</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                   <td>{{$order->user->name}}</td>
                                   <td>{{$order->user->email}}<br>{{$order->phone}}</td>
                                   <td>{{$order->date}}/{{$order->time}}</td>
                                   <td>{{$order->pizza->name}}</td>
                                   <td>{{$order->small_pizza}}</td>
                                   <td>{{$order->medium_pizza}}</td>
                                   <td>{{$order->large_pizza}}</td>
                                   <td>{{$order->v_cheese}}</td>
                                   <td>{{$order->pineapple}}</td>
                                   <td>{{$order->salami}}</td>
                                   <td>{{$order->olives}}</td>
                                   <td>{{$order->s_beef}}</td>
                                   <td>{{$order->hotdog}}</td>
                                   <td>{{$order->delivery}}</td>
                                   <td>£{{ ($order->pizza->small_pizza_price * $order->small_pizza)+
                                            ($order->pizza->medium_pizza_price * $order->medium_pizza)+
                                            ($order->pizza->large_pizza_price * $order->large_pizza)+
                                            ($order->pizza->delivery_price * $order->delivery)+
                                            (($order->small_pizza+$order->medium_pizza+$order->large_pizza)*
                                            (($order->v_cheese+$order->pineapple+$order->salami+$order->olives+$order->s_beef+$order->hotdog)*$order->pizza->topping_price))
                                            }}</td>
                                   <td>{{$order->body}}</td>
                                   <td>{{$order->status}}</td>
                                </tr> 
                                @endforeach        
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: red;
            color: #fff;
        }

        .card-header {
            background-color: red;
            color: #fff;
            font-size: 20px;
        }

    </style>
@endsection
