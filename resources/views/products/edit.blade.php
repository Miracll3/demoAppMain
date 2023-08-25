@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card border-0 bg-white shadow">
                <div class="card-header fw-bold border-0 bg-white fs-5 border-bottom py-3">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <form method="POST" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="category_ids">Categories</label>
                                <select name="categories[]" id="categories" class="form-control shadow-none" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ in_array($category->id, old('category_ids', $product->categories->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
