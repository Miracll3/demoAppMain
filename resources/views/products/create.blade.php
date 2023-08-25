@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card border-0 bg-white shadow">
                <div class="card-header fw-bold border-0 bg-white fs-5 border-bottom py-3">{{ __('Create Product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control shadow-none" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="categories">Categories</label>
                                <select name="categories[]" id="categories" class="form-control shadow-none" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
