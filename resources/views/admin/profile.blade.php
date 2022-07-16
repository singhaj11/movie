@extends('admin.layouts.master')
@section('content')
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Profile</h1>
    <ol class="breadcrumb" style="border-bottom: 1px solid #e9ecef;background-color: unset;">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">profile</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="ibox">
                <div class="ibox-body">
                    <ul class="nav nav-tabs tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i>
                                Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-2">
                            <form action="javascript:void(0)">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" value="{{ auth()->user()->name }}" placeholder="First Name" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" value="{{ auth()->user()->email }}" placeholder="Email address" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Created Date</label>
                                    <input class="form-control" type="text" value="{{ auth()->user()->created_at->format('Y-m-d') }}" placeholder="Password" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection