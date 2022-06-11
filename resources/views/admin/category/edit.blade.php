@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2> Eidt Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update',$parent->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Category name</label>
                                    <input type="text" name="category_name" value="{{ $parent->category_name }}" class="form-control"  placeholder="Category Name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect12">Parent Category</label>
                                        <select class="form-control" id="exampleFormControlSelect12" name="parent">
                                            <option value="">Select Category Parent</option>
                                            @foreach ($categories as $index=>$cate)
                                                <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <button class="btn btn-primary" type="submit">Update Category </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection