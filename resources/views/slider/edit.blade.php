@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Ads</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ads.update',$ads->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="oldads" value="{{ $ads->slider_image }}" />
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Ads Image</label>
                                    <input type="file" name="adsimage" class="form-control" value="{{ $ads->slider_image }}" />
                                        @error('adsimage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <img src="{{ asset($ads->slider_image) }}" width="200;" height="200;" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Ads Title</label>
                                        <input type="text" name="adstitle" value="{{ $ads->slider_title }}" class="form-control">
                                            @error('adstitle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Ads Descripton </label>
                                        <textarea name="adsdescription" cols="30" rows="10">{{ $ads->slider_description }}</textarea>
                                            @error('adsdescription')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                </div>
                               
                                <button class="btn btn-primary" type="submit">Edit Slider</button>
                            </form>
                            </div>
                           
                      
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection