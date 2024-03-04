@extends('layouts.app')
@section('title', 'Request Product')
@section('content')

    <x-container>
    @include("partials.__links")
    @include('partials._title', ["title" => "REQUEST PRODUCT"])

    <form id="request_item" >
    <select id="staff_id" class="form-select" name="staff_id" aria-label="Default select example" style="margin-top:20px;">
        <option selected>Select Staff</option>
        @forelse ($user as $usr)
        <option value="{{$usr->user_id}}">{{$usr->email}}</option>
        @empty
        <option value="Admin">No Staff found.</option>
        @endforelse
    </select>

    <table class=" table table-bordered mb-5" style="width:100%; margin-top:10px;">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select id="product_id" class="form-select" name="product_id" aria-label="Default select example">
                        <option selected>Select Product</option>
                        @forelse ($product as $prod)
                        <option value="{{$prod->prod_id}}">{{$prod->prod_name}}</option>
                        @empty
                        <option value="Admin">Admin</option>
                        @endforelse
                    </select>
                </td>
                <td><input type="number" class="form-control"  id="quantity" name="quantity" value="0"></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-success" id="submit"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table" >
        <thead>
          <tr>
            <th scope="col">PRODUCT NAME</th>
            <th scope="col">QUANTITY</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody class="table-group-divider" id="item__request">
        </tbody>
      </table>
    </form>


    </x-container>
 
@endsection
