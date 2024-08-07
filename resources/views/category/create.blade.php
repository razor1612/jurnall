@extends('layouts.app');

@section('nopal')
    <div class="card">
        <div class="header">
            <h1>Form Create Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="md-3">
                    <label for="category-name" class="form-label">Category name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="category-name" name="name">
                    @error('name')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
