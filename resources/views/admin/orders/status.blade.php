@extends('layouts.dashboard')


@section('content')

<div class="content">
    <div class="row">
        <div class="col-8">
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                <h2>Change Order Status</h2>
                <div>
                    
                </div>
                </div>
                <div class="card-body pt-0 pb-5">
            <form action="{{ route('orders.admin.update', $order->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}"/>
                <div class="form-group">
                    
                    <select class="form-control" name="status">
                        
                        <option value="Processing" {{($order->status === 'Processing') ? 'Selected' : ''}}>Processing</option>
                        <option value="Shipped" {{($order->status === 'Shipped') ? 'Selected' : ''}}>Shipped</option>
                        <option value="Delivered" {{($order->status === 'Delivered') ? 'Selected' : ''}}>Delivered</option>
                        <option value="completed" {{($order->status === 'Completed') ? 'Selected' : ''}}>Completed</option>
                        <option value="Canceled" {{($order->status === 'Canceled') ? 'Selected' : ''}}>Canceled</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Change"/>
                </div>
            
            </form>
        </div>
    </div>
</div>

    </div>
</div>

@endsection