@extends('master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Channel Details</b></div>
            <div class="col col-md-6">
                <a href="{{ route('channels.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>ChannelName:</b></label>
            <div class="col-sm-10">
                {{ $channels->ChannelName }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Description:</b></label>
            <div class="col-sm-10">
                {{ $channels->Description }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>SubscribersCount:</b></label>
            <div class="col-sm-10">
                {{ $channels->SubscribersCount }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <form method="POST" action="{{ route('channels.destroy', $channels->ChannelID) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
