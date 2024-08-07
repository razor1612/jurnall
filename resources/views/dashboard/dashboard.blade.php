@extends('layouts.app')

@section('nopal')
    <h1>Dashboard</h1>
    <div class="card">
        <div class="card-header">
            <h3>Journal {{ now()->dayName }}</h3>
            @if (auth()->user()->role != 'coordinator')
                <a href="{{ route('journal.store') }}" class="btn btn-primary">Create</a>
            @endif
        </div>
    </div>
    <table class="table">
        <tr>
            <th scope="col">#</th>
            @if (auth()->user()->role != 'employee')
                <th scope="col">Employee</th>
            @endif
            <th scope="col">Timing</th>
            <th scope="col">Categories</th>
            <th scope="col">Description</th>
            <th scope="col">Coordinator</th>
            <th scope="col">Target</th>
            <th scope="col">Status</th>
            <th scope="col">Comment</th>
            @if (auth()->user()->role != 'employee')
                <th scope="col">Terakhir Diubah</th>
            @endif
            @if (auth()->user()->role != 'coordinator')
                <th scope="col">Action</th>
            @endif
        </tr>
        <tbody>
            @foreach ($journal as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    @if (auth()->user()->role != 'employee')
                        <td>{{ $item->employee_name }}</td>
                    @endif
                    <td>{{ $item->timing == 'before' ? 'Sebelum' : 'Sesudah' }} Istirahat</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->coordinator_name }}</td>
                    <td>{{ $item->target }}</td>
                    <td>{{ $item->status == 'progress' ? 'Progress' : 'Complete' }}</td>
                    <td>{{ $item->comment }}</td>
                    @if (auth()->user()->role == 'coordinator')
                        <td>{{ $item->updated_at }}</td>
                    @endif
                    <td>
                        @if (auth()->user()->role != 'coordinator')
                            <form action="{{ route('dashboard.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('dashboard.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning me-2">Edit</a>
                                <button type="submit" onclick="return confirm('are u sure dude?')"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
