@extends('layouts.app');

@section('nopal')
<a href="{{ route('category.index') }}">Back</a>
    <div class="card">
        <div class="header">
            <h1>Form Edit Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="md-3">
                    <label for="category-name" class="form-label">Category name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="category-name" name="name" value="{{ $category->name }}">
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
