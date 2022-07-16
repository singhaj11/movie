@extends('admin.layouts.master')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="border-bottom: 1px solid #e9ecef;background-color: unset;">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Movies</li>
    </ol>
</nav>
<div class="page-head clearfix">
    <div class="row">
        <div class="col-6">
            <div class="head-title">
                <h4>Movies</h4>
            </div><!-- ends head-title -->
        </div>
        <div class="col-6">
            <a class="btn btn-primary pull-right btn-sm" id="addNew"
                href="{{ route('movies.create') }}">
                <em class="fa fa-plus" aria-hidden="true"></em> Add New
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form method="get" action="{{ route('movies.index') }}" class="mb-2">
            <div class="form-row align-items-center">
                <div class="col-auto mb-2" id="">
                    <label class="sr-only" for="keyword">Search keyword</label>
                    <input type="text" class="form-control" value="{{ request()->get('keyword') }}" id="keyword"
                        placeholder="Search keyword" name="keyword">
                </div>
                <div class="form-row align-items-center">
                    <button class="btn btn-primary mb-2 ml-2" type="submit"><i class="fa fa-search"
                            aria-hidden="true"></i></em> Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('admin.partials.message')
<div class="ibox">
    <div class="table table-bordered table-striped table-responsive">
        <table class="table" id="example-table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Release Date</th>
                    <th>Status</th>
                    <th>Likes Count</th>
                    <th>Poster</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!$items->isEmpty())
                @foreach($items as $index => $item) 
                <tr>
                    <td>{{ $index + $items->firstItem() }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->release_date }}</td>
                    <td>
                        <span class="badge badge-{{ $item->status == '1' ? 'success' : 'danger' }}">
                            {{ $item->status == '1' ? 'Published' : 'Un published' }}</span>
                    </td>
                    <td>{{ count($item->favourites) }}</td>
                    <td>
                        <img src="{{ asset('/uploads/movies'). '/' .$item->image }}" alt="" height="100px" width="100px">
                    </td>
                    <td>
                        <div class="d-flex">
                        <a href="{{ route('movies.edit', $item->id) }}" class="btn btn-default btn-sm m-r-5" data-toggle="tooltip" data-original-title="Edit"><i
                                class="fa fa-pencil font-14"></i></a>
                        <form action="{{ route('movies.destroy', $item->id) }}" method="post" class="d-flex"
                            onsubmit="return confirm('Do you really want to delete this movie?');">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Delete"><i
                            class="fa fa-trash font-14"></i></button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">No Data to Display</td>
                </tr>
                @endif
            </tbody>
        </table>
        
    </div>
</div>

{{ $items->withQueryString()->links() }}

@endsection