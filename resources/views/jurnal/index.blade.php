@extends('layouts.app')

@section('nopal')

    <div class="card">
        <div class="card-header">
            @if (auth()->user()->role != 'coordinator')
                <h3>Journal Create</h3>
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
                <form action="{{ route('journal.store') }}" method="POST">
                    @csrf
                    <label class="form-label">Timing</label>
                    <select class="form-control mb-3" name="timing">
                        <option value="before">Sebelum Istirahat</option>
                        <option value="after">Sesudah Istirahat</option>
                    </select>
                    <label class="form-label">Categories</label>
                    <select class="form-control mb-3" name="categories_id">
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">Coordinator</label>
                    <select class="form-control mb-3" name="coordinator_id">
                        @foreach ($coordinator as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Target</label>
                        <textarea type="text" class="form-control" name="target"></textarea>
                    </div>
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="progress">Tidak Tercapai</option>
                        <option value="complete">Tercapai</option>
                    </select>
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea type="text" class="form-control" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
        @endif
        <div class="card-body">
            <table class="table">
                <thead>
                    <div class="card-header">
                        <h3>Journal All</h3>
                    </div>
                    <tr>
                        <th scope="col">#</th>
                        {{-- @if (auth()->user()->role != 'coordinator') --}}
                        {{-- <th scope="col">Employee</th> --}}
                        {{-- @endif --}}
                        <th scope="col">Timing</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Coordinator</th>
                        <th scope="col">Description</th>
                        <th scope="col">Target</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comment</th>
                        @if (auth()->user()->role != 'coordinator')
                            <th scope="col">Action</th>
                        @endif
                        {{-- @if (auth()->user()->role != 'coordinator') --}}
                        {{-- <th scope="col">Terakhir Diubah</th> --}}
                        {{-- @endif --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journal as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            {{-- @if (auth()->user()->role != 'coordinator') --}}
                            {{-- <td>{{ $item->employee_name }}</td> --}}
                            {{-- @endif --}}
                            <td>{{ $item->timing == 'before' ? 'Sebelum' : 'Sesudah' }} Istirahat</td>
                            <td>{{ $item->categories_name }}</td>
                            <td>{{ $item->coordinator_name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->target }}</td>
                            <td>{{ $item->status == 'progress' ? 'Tidak' : '' }} Tercapai</td>
                            <td>{{ $item->comment }}</td>
                            {{-- @if (auth()->user()->role != 'coordinator') --}}
                            {{-- <td>{{ $item->update_at }}</td> --}}
                            {{-- @endif --}}
                            <td>
                                @if (auth()->user()->role != 'coordinator')
                                    <form action="{{ route('journal.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('journal.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <button type="submit" onclick="return confirm('are you sure?')"
                                            class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
