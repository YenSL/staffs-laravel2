@extends('layouts.app')

This is a homepage

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Dashboard
                       
                    </div>
                    <div class="card-body">
                       You're logged in!!
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
