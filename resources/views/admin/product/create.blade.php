@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add New Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Product name</label>
                                    <input type="text" name="product_name" class="form-control" id="cname"  placeholder="Product Name" >
                                    
                                        @error('product_name')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                               
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Product Price</label>
                                    <input type="number" name="product_price" class="form-control @error('price') is-invalid @enderror" id="cname"  placeholder="Product Price">
                                    @error('product_price')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Product Image</label>
                                    <input type="file" name="product_image" class="form-control @error('category_name') is-invalid @enderror" id="cname"  placeholder="Category Name">
                                    @error('product_image')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" name="product_description" rows="3"></textarea>
                                    @error('product_description')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Product Size</label>
                                    <input type="text" name="product_size" class="form-control @error('category_name') is-invalid @enderror" id="cname"  placeholder="Product Size">
                                </div>
                                <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Return Policy</label>
                                    <textarea class="form-control" name="product_polciy" rows="3"></textarea>
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                        
                                            @foreach ($categories as $index=>$parent)
                                                <label class="control control-checkbox">{{  $parent->category_name }}
                                                    <input type="checkbox" name="category[]" value="{{  $parent->id }}"/>
                                                    <div class="control-indicator"></div>
                                                </label>
                                                
                                                    @foreach ( $parent->children as $index=>$subcategory)
                                                    <div class="form-group row child-cate m-2">
                                            
                                                        <div class="col-12 col-md-9">
                                                            <label class="control control-checkbox ">{{  $subcategory->category_name }}
                                                                <input type="checkbox" name="category[]" value="{{  $subcategory->id }}"/>
                                                                <div class="control-indicator"></div>
                                                            </label>
                                                        </div>
                                                    </div>
                                            
                                                    @endforeach
                                            @endforeach
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <button class="btn btn-primary" type="submit">Add New </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection