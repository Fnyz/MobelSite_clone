<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Transaction')
@section('content')


    <x-container>
      @include("partials.__links")


    @include('partials._title', ["title" => "TRANSACTION HISTORY"])

    <div>
      <a href="{{route("pages.dashboard")}}" style="margin-top:20px; font-weight:bold;">GO BACK TO DASHBOARD</a>
      <span>/</span>
      <a href="{{route("pages.transaction.transac")}}" style="margin-top:20px; font-weight:bold;">ADD TRANSACTION</a>
    </div>

    <table class="table" style="margin-top: 10px;">
      <thead>
        <tr>
   
          <th scope="col">TRANSCODE #</th>
          <th scope="col">SUPPLIER</th>
          <th scope="col">DATE</th>
          <th scope="col">REMARKS</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($transactions as $transaction)
          <tr>
            <td>{{$transaction->trans_code}}</td>
            <td>{{$transaction->supp_company}}</td>
            <td>{{$transaction->date_ordered}}</td>
            <td style="font-weight: bold; color:blue;" >{{$transaction->remarks}}</td>
            <td>
              <a href="{{route("pages.transaction.record", ["transaction" => $transaction->trans_code])}}" class="btn btn-danger" style="width: 100%;">
                <i class="fa-solid fa-list"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
      </tbody>
    </table>


  
  </x-container>
   

 
@endsection
