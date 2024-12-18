@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h2>Welcome, Admin!</h2>
    <div class="row">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Users</h5>
                    <p>120 Active</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Products</h5>
                    <p>350 Items</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Sales</h5>
                    <p>$12,000</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Repairs</h5>
                    <p>45 Pending</p>
                </div>
            </div>
        </div>
    </div>
@endsection
