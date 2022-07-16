@extends('admin.layouts.master')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="border-bottom: 1px solid #e9ecef;background-color: unset;">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('movies.index') }}">Movies</a></li>
        @if(isset($item))
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
        @else
        <li class="breadcrumb-item active" aria-current="page">Create</li>
        @endif
    </ol>
</nav>
<div class="page-head clearfix">
    <div class="row">
        <div class="col-6">
            <div class="head-title pl-2">
                <h4>Movie @if(isset($item)) Edit @else Create @endif</h4>
            </div><!-- ends head-title -->
        </div>
    </div>
</div>
<div class="fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-body">
                    @if(isset($item))
                        <form class="form-horizontal" action="{{ route('movies.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form class="form-horizontal" action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="form-group row @error('title') has-error @enderror">
                            <label class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="title" class="form-control"
                                    placeholder="Title"
                                    value="{{ $item->title ?? old('title') }}"
                                    required>
                                @error('title')
                                <label id="title-error" class="help-block error" for="title">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row @error('release_date') has-error @enderror"">
                            <label class="col-sm-2 col-form-label">Release Date <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="release_date" class="form-control date-picker"
                                    placeholder="Release Date"
                                    autocomplete="off"
                                    value="{{ $item->release_date ?? old('release_date') }}"
                                    required>
                                @error('release_date')
                                <label id="release_date-error" class="help-block error" for="release_date">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row @error('description') has-error @enderror"">
                            <label class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <textarea name="description" class="form-control" 
                                    id="" cols="30" rows="10"
                                    placeholder="Description ..."
                                    required>{{ $item->description ?? old('description') }}</textarea>
                                @error('description')
                                <label id="description-error" class="help-block error" for="description">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row @error('poster') has-error @enderror"">
                            <label class="col-sm-2 col-form-label">Poster @if(!isset($item))<span class="text-danger">*</span>@endif</label>
                            <div class="col-sm-6">
                                <input type="file" name="poster" class="form-control"
                                    placeholder="Release Date"
                                    accept="image/*"
                                    {{ isset($item) ? '' : 'required' }}>
                                @error('poster')
                                <label id="poster-error" class="help-block error" for="poster">{{ $message }}</label>
                                @enderror
                                <div class="row ml-2 mt-2">
                                    @if(isset($item))
                                        @if(!empty($item->image) && file_exists(public_path('uploads/movies/').$item->image))
                                        <img src="{{ \URL::asset('uploads/movies'.'/'.$item->image) }}" height="100px" width="100px" alt="">
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row @error('status') has-error @enderror"">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <label class="ui-radio ui-radio-success ui-radio-inline">
                                    <input type="radio" name="status"
                                    {{ (old('status') ?? $item->status ?? 1) == 1 ? 'checked' : '' }}
                                    required
                                    value="1">
                                    <span class="input-span"></span>Publish
                                </label>
                                <label class="ui-radio ui-radio-danger ui-radio-inline">
                                    <input type="radio" name="status"
                                    {{ (old('status') ?? $item->status ?? '') == 0 ? 'checked' : '' }}
                                    value="0">
                                    <span class="input-span"></span>Un publish
                                </label>
                                @error('status')
                                <label id="status-error" class="help-block error" for="status">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection