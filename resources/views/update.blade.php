@extends('layouts.app')

@section('content')
<div class="container">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
	<div class="col-md-offset-3 col-md-6 col-md-offset-3">
		<form name="addpost" method="POST" action="{{ route('updatepost') }}" enctype="multipart/form-data">
		 @csrf
 <input id="id" type="hidden" class="form-control @error('posttitle') is-invalid @enderror" name="id" value="3" required autocomplete="" autofocus>

			<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Post Title') }}</label>

                            <div class="col-md-6">
                                <input id="posttitle" type="text" class="form-control @error('posttitle') is-invalid @enderror" name="posttitle" value="{{ old('posttitle') }}" required autocomplete="" autofocus>

                                @error('posttitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
					</div>
					<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Post Content') }}</label>
                            <div class="col-md-6">
                               <textarea name="postcontent" class="form-control @error('postcontent') is-invalid @enderror"  value="{{ old('postcontent') }}">{{ old('postcontent') }}</textarea>
                                @error('postcontent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						</div>
					<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Post authoe') }}</label>
                            <div class="col-md-6">
                                <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name') }}"  autocomplete="" autofocus>

                                @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						</div>
					<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Post catogery') }}</label>
                            <div class="col-md-6">
                                <input id="catogory" type="text" class="form-control @error('catogory') is-invalid @enderror" name="catogory" value="{{ old('catogory') }}" required autocomplete="" autofocus>

                                @error('catogory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                   </div>
					<input type="file" name="filename" id="filename">
				   <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Post') }}
                                </button>
						</div>
		
		</div>
	</div>

</div>

@endsection