@extends('layouts.dashboard')


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                    @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        {{Session::get('success')}}
                    </div>
                    @endif
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                <h2>Customer Orders</h2>
                <div>
                    
                </div>
                </div>
                <div class="card-body pt-0 pb-5">
                <table class="table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total Quantity</th>
                            <th>Totlal Price </th>
                            <th>Order Created</th>
                            <th>Order Status</th>
                            <th>Show Items</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($userOrders as $order)
                            <tr>
                                <td >{{ $order->order_number }}</td>
                                <td >{{ $order->item_count }}</td>
                                <td >{{ number_format($order->grand_total, 2) }}</td>
                                <td >{{ Carbon\Carbon::parse($order->created_at)->format('Y-m-d'); }}</td>
                                <td ><h5><span class="badge   @if($order->status === 'Processing')
                                        badge-secondary
                                    @elseif ($order->status === 'Shipped')
                                        badge-warning
                                    @elseif ($order->status === 'Delivered')
                                        badge-primary
                                    @elseif ($order->status === 'completed')
                                        badge-success
                                        @elseif ($order->status === 'Canceled')
                                        badge-danger
                                    @else  badge-secondary 
                                    @endif  "> {{ $order->status }}</span></h5>
                              </td>
                                <td ><a class="btn btn-info btn-sm" href="{{ route('order.user.items',$order->id) }}"> <i class="mdi mdi-eye"></i> Order Details</a></td>
                            
                              </tr>
                       @endforeach
                    </tbody>
                </table>
                </div>
                </div>
                </div>
        </div>	
    </div>

   
@endsection