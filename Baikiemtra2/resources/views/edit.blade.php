@extends('master')

@section('content')

<div class="card">
    <div class="card-header">Edit Channel
        <a href="{{ route('channels.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
    </div>
        <form method="post" action="{{ route('channels.update', $channel->ChannelID) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">ChannelName</label>
                <div class="col-sm-10">
                    <input type="text" name="ChannelName" class="form-control" value="{{ $channel->ChannelName }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="Description" class="form-control" value="{{ $channel->Description }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">SubscribersCount</label>
                <div class="col-sm-10">
                    <input type="text" name="SubscribersCount" class="form-control" value="{{ $channel->SubscribersCount }}" />
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $channel->ChannelID }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>


@endsection('content')
