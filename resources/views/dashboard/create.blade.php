@extends('layouts.app')

@section('nopal')
    <div class="card">
        <div class="header">
            <h1>Form Create Category</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('dashboard.dashboard') }}" method="POST">
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
            </form>
        </div>
    </div>
@endsection
