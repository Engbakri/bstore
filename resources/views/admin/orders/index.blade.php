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
                            <th>Customer</th>
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
                                <td >{{ $order->user->name }}</td>
                                <td style="text-align: center;" >{{ $order->item_count }}</td>
                                <td  style="text-align: center;">{{ number_format($order->grand_total, 2) }}</td>
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
                                @endif  "> {{ $order->status }}</span></h5></td>
                                <td ><a class="btn btn-info btn-sm" href="{{ route('order.admin.items',$order->id) }}"> <i class="mdi mdi-eye"></i> Order Details</a></td>
                                <td class="text-right">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                      <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                          <a href="{{ route('orders.admin.edit',$order->id) }}">Change Status</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </td>
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