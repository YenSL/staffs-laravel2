Pizza created! from index blade php
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View List</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create New Pizza</a>
                        <a href="{{route('user.order')}}" class="list-group-item list-group-item-action">User order</a>
                          
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="card">

                    <div class="card-header">All Pizza
                        <a href="{{route('pizza.create')}}">
                            <button class="btn btn-success" style="float: right">Add Pizza</button>
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Small price</th>
                                    <th scope="col">Medium price</th>
                                    <th scope="col">Large price</th>
                                    <th scope="col">Topping price (each)</th>
                                    <th scope="col">Delivery price</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($pizzas) > 0)
                                    @foreach ($pizzas as $key => $pizza)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td><img src="{{ Storage::url($pizza->image) }}" width="80"></td>
                                            <td>{{ $pizza->name }}</td>
                                            <td>{{ $pizza->description }}</td>
                                            <td>£{{ $pizza->small_pizza_price }}</td>
                                            <td>£{{ $pizza->medium_pizza_price }}</td>
                                            <td>£{{ $pizza->large_pizza_price }}</td>
                                            <td>£{{ $pizza->topping_price }}</td>
                                            <td>£{{ $pizza->delivery_price }}</td>
                                            <td><a href="{{ route('pizza.edit', $pizza->id) }}"><button
                                                        class="btn btn-primary">Edit</button></a></td>
                                            <td><button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{ $pizza->id }}">Delete</button></td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $pizza->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="{{ route('pizza.destroy', $pizza->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </tr>
                                    @endforeach

                                @else
                                    <p>No pizza to show</p>
                                @endif
                            </tbody>
                        </table>
                        {{ $pizzas->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
