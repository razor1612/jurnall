@extends('layouts.app');

@section('nopal')
    {{-- <a href="{{ route('journal.index') }}">Back</a> --}}
    <div class="card">
        <div class="card-header">
            <h1>Form Edit Journal</h1>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.update', ['id' => $journal->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="form-label">Timing</label>
                <select class="form-control mb-3" name="timing">
                    <option value="before" @selected($journal->timing == 'before')>Sebelum Istirahat</option>
                    <option value="after" @selected($journal->timing == 'after')>Sesudah Istirahat</option>
                </select>
                <label class="form-label">Categories</label>
                <select class="form-control mb-3" name="categories_id">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}" @selected($journal->categories_id == $item->id)>{{ $item->name }}</option>
                    @endforeach
                </select>
                <label class="form-label">Coordinator</label>
                <select class="form-control mb-3" name="coordinator_id">
                    @foreach ($coordinator as $item)
                        <option value="{{ $item->id }}" @selected($journal->coordinator_id == $item->id)>{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea type="text" class="form-control" name="description">{{ $journal->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Target</label>
                    <textarea type="text" class="form-control" name="target">{{ $journal->target }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="progress" @selected($journal->status == 'progress')>Tidak Tercapai</option>
                        <option value="complete" @selected($journal->status == 'complete')>Tercapai</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Comment</label>
                    <textarea type="text" class="form-control" name="comment">{{ $journal->comment }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
