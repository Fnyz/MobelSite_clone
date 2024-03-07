<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Transaction')
@section('content')


    <x-container>
      @include("partials.__links")


    @include('partials._title', ["title" => "ORDER TRANSACTION"])

    @php
    $random_id = date('Ymd') . rand(10000, 99999);
    @endphp

    <div>
      <a href="{{route("pages.transaction")}}" style="margin-top:20px; font-weight:bold;">GO BACK TO TRANSACTION HISTORY</a>
    </div>

    <form id="Order__transactions">
      <input type="hidden" name="trans_code" id="trans_code" value="{{$random_id}}">

      <select class="form-select" id="supplier_id" name="supplier_id"  style="margin-top: 20px;">
      </select>

      <select class="form-select" id="transCode"  style="margin-top: 10px;">
      </select>

      <table class=" table table-bordered" style="width:100%; margin-top:10px;">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
  
            <tr>
                <td>
                  <select class="form-select" id="product_id" name="product_id" disabled >
                  </select>
                </td>
                <td><input type="number" class="form-control"   id="trans_price" name="trans_price" min="0" step="0.25" value="0.00"></td>
                <td><input type="number" class="form-control"  id="trans_quantity" name="trans_quantity" value="0" ></td>
                <td><input type="number" class="form-control"  id="subtotal" name="subtotal" step="0.25" value="0.00"  ></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-success" id="submit"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </td>
            </tr>
  
  
        </tbody>
    </table>
    </form>


  
  <table class="table">
    <thead>
      <tr>
        <th scope="col">PRODUCT NAME</th>
        <th scope="col">PRICE</th>
        <th scope="col">QUANTITY</th>
        <th scope="col">SUBTOTAL</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody class="table-group-divider" id="item__order-transactions">
    </tbody>
  </table>



  
  <form id="submitTrans" action="{{route("storeTransaction")}}" style="display: none;">
    @csrf
    @method("POST")
    <label style="margin-bottom:5px; margin-top:50px; color:gray; font-weight:bold;"> Order Payment Amount: </label>
    <input type="number" class="form-control" placeholder="Input payment here..." name="trans_payment"  id="trans_payment">
    <button type="submit" style="display: none;" class="btn btn-success" id="savePur" >Save Transaction</button>
  </form>










  
  </x-container>
   

 
@endsection
