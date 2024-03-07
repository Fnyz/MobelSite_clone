
@extends('layouts.app')
@section('title', 'RECORDS')
@section('content')


    <x-container>
    @include("partials.__links")
    @include('partials._title', ["title" => "TRANSACTION RECORD"])


   
  
        <div>


            <div class="card shadow mb-4">

                <div class="card-body">
                      @foreach ($transactions as $trans)
                          
                  
                        <div class="form-group row text-left mb-0">
                            <div class="col-sm-9">
                             
                            </div>

                            <div class="col-sm-3 py-1">
                                <h6>
                                    Date: {{$trans->trans_date}}
                                </h6>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row text-left mb-0 py-2">
                            <div class="col-sm-4 py-1">
                                <h6 class="font-weight-bold">
                                    Supplier: {{$trans->supp_company}}
                                </h6>
                                <h6>
                                    Phone: {{$trans->supp_phone}}
                                </h6>
                            </div>
                            <div class="col-sm-4 py-1"></div>
                            <div class="col-sm-4 py-1">
                                <h6>
                                    Transaction # {{$trans->trans_code}}
                                </h6>
                                <h6 class="font-weight-bold">
                                    Staff: {{$trans->email}}
                                </h6>
                                <h6>

                                </h6>
                            </div>
                        </div>
                        @break;
                        @endforeach

              
                        @foreach ($transactions as $trans)
                          
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">Products</th>
                                <th width="8%">Qty</th>
                                <th width="8%">Price</th>
                                <th width="8%">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                                <tr>
                                    <td>{{$trans->prod_name}}</td>
                                    <td>{{$trans->quantity}}</td>
                                    <td>₱ {{$trans->price}}</td>
                                    <td>₱ {{$trans->subtotal}}</td>
                         
                                </tr>

                        </tbody>
                    </table>


           
                        <div class="form-group row text-left mb-0 py-2">
                            <div class="col-sm-4 py-1"></div>
                            <div class="col-sm-3 py-1"></div>
                            <div class="col-sm-4 py-1">


                                <h4>
                                    Cash Amount: <b class="text text-danger">₱ {{$trans->payment}} </b>
                                </h4>
                                <table width="100%">
                                    <tr>
                                        <td class="font-weight-bold">Total:</td>
                                        <td class="font-weight-bold text-right text-primary">₱ {{$trans->Total}}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Change: </td>
                                        <td class="font-weight-bold text-right text-primary">₱ {{$trans->Total_change}} </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-1 py-1"></div>
                        </div>

                        
                    @break;
                    @endforeach

                 
                </div>

            </div>


            <a href="/transaction" class="text text-end btn btn-danger">Go Back</a>





  
    </x-container>
   

 
@endsection
