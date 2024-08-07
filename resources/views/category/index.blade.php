@extends('layouts.app')

@section('nopal')
    <div class="card">
        <div class="card-header">
            <h3>List Category</h3>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create New</a>
        </div>
        <div class="card-body"></div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('category.destroy', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('category.edit', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <button type="submit" onclick="return confirm('are you sure?')"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
