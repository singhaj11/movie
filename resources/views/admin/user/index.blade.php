@extends('admin.layouts.master')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="border-bottom: 1px solid #e9ecef;background-color: unset;">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>
<div class="page-head clearfix">
    <div class="row">
        <div class="col-6">
            <div class="head-title">
                <h4>Users</h4>
            </div><!-- ends head-title -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form method="get" action="{{ route('users') }}" class="mb-2">
            <div class="form-row align-items-center">
                <div class="col-auto mb-2" id="">
                    <label class="sr-only" for="keyword">Search keyword</label>
                    <input type="text" class="form-control" value="{{ request()->get('keyword') }}" id="keyword"
                        placeholder="Search keyword" name="keyword">
                </div>
                <div class="col-auto mb-2" id="">
                    <input type="text" class="form-control daterange" value="{{ request()->get('range') }}"
                        id="daterange" placeholder="Select Date Range" name="range" autocomplete="off">
                    <input type="hidden" name="from" id="from-date" value="{{Request::get('from')}}">
                    <input type="hidden" name="to" id="to-date" value="{{Request::get('to')}}">
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Favourite Movies</th>
                </tr>
            </thead>
            <tbody>
                @if(!$items->isEmpty())
                @foreach($items as $index => $item)
                <tr>
                    <td>{{ $index + $items->firstItem() }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @foreach($item->favourites as $favourite_movie)
                        @if($favourite_movie->favouriteable)
                        <li>{{ $favourite_movie->favouriteable->title }}, {{ $favourite_movie->favouriteable->release_date }}</li>
                        @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">No Data to Display</td>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>

{{ $items->withQueryString()->links() }}

@endsection