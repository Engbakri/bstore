@extends('layouts.dashboard')


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                    @if(Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                <h2>All Ads Slider</h2>
                <div>
                    <a class="btn btn-primary" href="{{ route('ads.create') }}">Add Ads</a>
                </div>
                </div>
                <div class="card-body pt-0 pb-5">
                <table class="table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th> Images</th>
                            <th >Title</th>
                            <th >Decription</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($ads as $ads)
                            <tr>
                                <td >{{ $ads->id }}</td>
                                <td >
                                    <img src="{{ asset($ads->slider_image) }}" width="100;" height="100;"/>
                                </td>
                                <td >{{ $ads->slider_title }}</td>
                                <td >{{ $ads->slider_description }}</td>
                                
                                <td class="text-right">
                                  <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                      <li class="dropdown-item">
                                        <a href="{{ route('ads.edit',$ads->id) }}">Edit</a>
                                      </li>
                                      <li class="dropdown-item">
                                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('ads.delete', $ads->id) }}" title="Delete ADs">
                                          <i class="fas fa-trash text-danger  fa-lg">Delete</i>
                                      </a>
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


    <!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" id="smallBody">
              <div>
                  <!-- the result to be displayed apply here -->
              </div>
          </div>
      </div>
  </div>
</div>




   
@endsection