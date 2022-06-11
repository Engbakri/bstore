@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add New Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Category name</label>
                                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="cname"  placeholder="Category Name" required>
                                    <div class="valid-feedback">
                                        @error('category_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Parent Category</label>
                                        <select class="form-control" name="parent">
                                            <option value="">Select Category Parent</option>
                                            @foreach ($categories as $index=>$parent)
                                                <option value="{{  $parent->id }}">{{ $parent->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <button class="btn btn-primary" type="submit">Add </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection