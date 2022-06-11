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
                <h2>All Categories</h2>
                <div>
                    <a class="btn btn-primary" href="{{ route('category.create') }}">Add Category</a>
                </div>
                </div>
                <div class="card-body pt-0 pb-5">
                <table class="table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th>Category Name</th>
                            <th class="d-none d-md-table-cell">SubCategories</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td >{{ $category->id }}</td>
                                <td >
                                  <a class="text-dark" href="">{{ $category->category_name }}</a>
                                </td>
                                
                                
                                <td>
                                    <ul>
                                                @foreach ( $category->children as $index=>$subcategory)
                                                    <li><span class="badge badge-success m-2">{{  $subcategory->category_name }}</span> </li>
                                                @endforeach
                                    </ul>
                                </td>
                               
                                
                            
                                <td class="text-right">
                                  <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                      <li class="dropdown-item">
                                        <a href="{{ route('category.edit',$category->id) }}">Edit</a>
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