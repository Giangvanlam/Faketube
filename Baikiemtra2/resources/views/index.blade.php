@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif

<div class="card">
    <script>
        function confirmDelete(ChannelID) {
            if (confirm("Are you sure you want to delete channel?")) {
                // Nếu người dùng xác nhận xóa, chuyển hướng đến route xóa department với id tương ứng
                window.location.href = "{{ route('channels.destroy', '') }}" + "/" + ChannelID;
            }
        }
    </script>

    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Channel Data</b> 
        </div>
            <div class="col col-md-6">
                <a href="{{ route('channels.create') }}" class="btn btn-success btn-sm float-end">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ChannelID</th>
                <th>ChannelName</th>
                <th>Description</th>
                <th>SubscribersCount</th>
                <th>Url</th>
            </tr>

            @foreach($channels as $row)

            <tr>
                <td>{{ $row->ChannelID }}</td>
                <td>{{ $row->ChannelName }}</td>
                <td>{{ $row->Description }}</td>
                <td>{{ $row->SubscribersCount }}</td>
                <td>{{ $row->Url }}</td>
                <td>
                    <form method="post" action="{{ route('channels.destroy', $row->ChannelID) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('channels.show', $row->ChannelID) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('channels.edit', $row->ChannelID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $row->ChannelID }})">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </table>
        <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    @if ($channels->currentPage() != 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $channels->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    @endif
                    @for ($i = max(1, $channels->currentPage() - 2); $i <= min($channels->lastPage(), $channels->currentPage() + 2); $i++)
                        <li class="page-item {{ ($channels->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $channels->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor
                        @if ($channels->currentPage() != $channels->lastPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $channels->nextPageUrl() }}">Next</a>
                        </li>
                        @endif
                </ul>
            </nav>
        </div>

    </div>
</div>

@endsection