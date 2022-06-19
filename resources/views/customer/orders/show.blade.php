@extends('layouts.dashboard')


@section('content')
<div class="content-wrapper">
    <div class="content">		
        	<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
                  <div class="d-flex justify-content-between">
                    <h4 class="text-dark font-weight-medium">Order Details</h4>
                      <h4 class="text-dark font-weight-medium">Order ID : {{ $order->order_number }}</h4>
                      <div class="btn-group">
                          <button class="btn btn-sm btn-secondary">
                              <i class="mdi mdi-content-save"></i> Save</button>
                          <button class="btn btn-sm btn-secondary">
                              <i class="mdi mdi-printer"></i> Print</button>
                      </div>
                  </div>
                  
                  <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Price</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($order->items as $index=>$item)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $item->product->product_name }}</td>
                              <td>{{ $item->quantity }} </td>
                              <td>{{  number_format($item->price, 2) }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <div class="row justify-content-end">
                      <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
                          <ul class="list-unstyled mt-4">
                              <li class="mid pb-3 text-dark"> Subtotal
                                  <span class="d-inline-block float-right text-default">${{ number_format($order->grand_total, 2) }}</span>
                              </li>
                              <li class="mid pb-3 text-dark">Vat(0%)
                                  <span class="d-inline-block float-right text-default">$00,00</span>
                              </li>
                              <li class="pb-3 text-dark">Total
                                  <span class="d-inline-block float-right">${{ number_format($order->grand_total, 2) }}</span>
                              </li>
                          </ul>
                          <a href="#" class="btn btn-block mt-2 btn-lg btn-warning btn-pill"> {{ $order->status}}</a>
                      </div>
                  </div>
              </div>
</div>

    


  </div>

@endsection