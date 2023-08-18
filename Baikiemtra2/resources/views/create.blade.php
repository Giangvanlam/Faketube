@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Add Channel</b></div>
            <div class="col col-md-6">
                <a href="{{ route('channels.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('channels.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">ChannelName</label>
                <div class="col-sm-10">
                    <input type="text" name="ChannelName" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="Description" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">SubscribersCount</label>
                <div class="col-sm-10">
                    <input type="text" name="SubscribersCount" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Url</label>
                <div class="col-sm-10">
                    <input type="text" name="Url" class="form-control" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>

@endsection('content')