@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card border-0 bg-white shadow">
                <div class="card-header fw-bold border-0 bg-white fs-5 border-bottom py-3">{{ __('Create Variant') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <form action="{{ route('variants.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Variant Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="product_id">Product</label>
                                <select name="product_id" id="product_id" class="form-control" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Add Variant</button>
                                <a href="{{ route('variants.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
