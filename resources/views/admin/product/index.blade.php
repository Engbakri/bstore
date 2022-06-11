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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                <h2>All Products</h2>
                <div>
                    <a class="btn btn-primary" href="{{ route('product.create') }}">Add product</a>
                </div>
                </div>
                <div class="card-body pt-0 pb-5">
                <table class="table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th> Name</th>
                            <th>Price</th>
                            <th>image</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td > {{ $product->id }} </td>
                                <td > {{ $product->product_name }}</td>
                                <td > {{ $product->product_price }}</td>
                                <td > <img src="{{ $product->product_image }}" width="100" height="100"> </td>
                                <td >
                                   @foreach ($product->categories as $item)
                                      <span class=" badge badge-success">{{ $item->category_name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-right">
                                  <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                      <li class="dropdown-item">
                                        <a href="{{ route('product.edit',$product->id) }}">Edit</a>
                                      </li>
                                      <li class="dropdown-item">
                                        <a href="#">Remove</a>
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