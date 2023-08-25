@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card border-0 bg-white shadow">
                <div class="card-header fw-bold border-0 bg-white fs-5 border-bottom py-3">{{ __('Variants') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex w-100">
                        <a href="{{route('variants.create')}}" class="btn btn-secondary fw-bold text-end ms-auto mb-4">Create</a>
                    </div>


                    <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Updated at</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($variants as $variant)
                                <tr>
                                <td>{{$variant->name}}</td>
                                <td>{{$variant->updated_at}}</td>
                                <td>
                                    <div class="d-inline-flex">
                                        {{-- <a href="{{route('variants.show', $variant->id)}}" class="btn p-0 border-0 text-success me-4 fw-bold">View</a> --}}
                                        <a href="{{route('variants.edit', $variant->id)}}" class="btn p-0 border-0 text-primary">Edit</a>
                                        <form action="{{route('variants.destroy', $variant->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn p-0 border-0 text-danger fw-bold ms-4">Delete</button>
                                        </form>

                                    </div>
                                </td>
                                </tr>
                            @empty
                                <tr><td colspan="12" class="text-center">No Variants added</td></tr>
                            @endforelse
                        </tbody>
                      </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
