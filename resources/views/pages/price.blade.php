@extends('layout.admin')

@section('content')
    <h1 class="mt-5 mb-5">Price list each variant for {{ $product->name }}</h1>
    @if (session()->has('variant'))
        <h3 class="text-danger mt-3">{{ session('variant') }}</h3>
    @endif
    @if(isset($variant) && $variant)
        <table class="table table-striped table-dark mt-3 mb-5">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Variant</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($variant as $var)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $var->name }}</td>
                        <td>{{ $var->price }}</td>
                        <td><a class="btn btn-danger" href="deleteVariant/{{ $var->id }}">Delete</a></td>
                    </tr>
                @endforeach
        </tbody>
        </table>
    @endif
    <form action="{{ route('productPrice') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Variant">
                <input type="number" name="price" id="price" class="form-control" placeholder="10000">
                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
            </div>
        </div>
        <button style="min-width: 120px;" type="submit" class="btn btn-success mt-3">Add Price</button>
    </form>
@endsection