@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card border-0 bg-white shadow">
                <div class="card-header fw-bold border-0 bg-white fs-5 border-bottom py-3">{{ __('Edit Variant') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <form method="POST" action="{{ route('variants.update', $variant->id) }}">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group mb-3">
                                <label for="name">{{ __('Variant Name') }}</label>
                                <input id="name" type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" value="{{ old('name', $variant->name) }}" required autocomplete="name" autofocus>
                        
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="product_id">Product</label>
                                <select name="product_id" id="product_id" class="form-control" disabled>
                                    <option value="{{ $variant->product->id }}">{{ $variant->product->name }}</option>
                                </select>
                            </div>
                        
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Variant') }}
                                </button>
                                <a href="{{ route('variants.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
