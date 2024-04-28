@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Customers</li>
                    </ol>
                </nav>

                <div class="card ">
                    <div class="card-header">Customers
                        <a style="float:right;" href="{{route('pizza.index')}}"><button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">View Pizza</button></a>
                        <a style="float:right;" href="{{route('pizza.create')}}"><button class="bnt btn-secondary btn-sm">Add new Pizza</button></a>
    
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Member since</th>
        
                                </tr>
                            </thead>
                            <tbody>
                                This is a customer page
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
