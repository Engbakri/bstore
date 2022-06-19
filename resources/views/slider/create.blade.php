@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add New Ads</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Ads Image</label>
                                    <input type="file" name="adsimage" class="form-control">
                                        @error('adsimage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Ads Image</label>
                                        <input type="text" name="adstitle" class="form-control">
                                            @error('adstitle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Ads Image</label>
                                        <textarea name="adsdescription" cols="30" rows="10"></textarea>
                                            @error('adsdescription')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                </div>
                               
                                <button class="btn btn-primary" type="submit">Add </button>
                            </form>
                            </div>
                           
                      
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection