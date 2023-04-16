@extends('layout.admin')

@section('content')
    <h1 class="mt-5 mb-5">Edit Product</h1>
    @if(isset($updateSucces))
        <h2>{{ $updateSucces}}</h2>
    @endif
    <form action="{{ route('editProduct') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <input type="text" name="name" id="name" class="form-control mb-3" value="{{ $product->name }}" placeholder="Product name">
                    <input type="hidden" name="id" id="id" class="form-control mb-3" value={{ $product->id }} placeholder="Product name">
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                    <textarea style="min-height: 300px;" name="description" id="description" class="form-control" placeholder="Porduct description">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    @if ($errors->has('thumbnail'))
                        <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                    @endif
                    <input type="file" name="thumbnail" id="thumbnail" value="{{ $product->thumbnail }}" class="form-control mb-3">
                    <label for="type">Product type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="game" {{ $product->type == "game" ? 'selected' : '' }}>Game</option>
                        <option value="provider" {{ $product->type == "provider" ? 'selected' : '' }}>Provider</option>
                        <option value="voucher" {{ $product->type == "voucher" ? 'selected' : '' }}>Voucher</option>
                    </select>
                    <div class="hasServer-wrapper" style="display:flex; flex-direction: column; align-items: baseline;">
                        <label class="mb-2 mt-3" for="hasServer">Is product need server?</label>
                        <input type="hidden" name="hasServer" id="hasServer" class="form-check-input mb-3" value="0">
                        <input type="checkbox" name="hasServer" id="hasServer" class="form-check-input mb-3" value="1" checked>
                    </div>
                    <label for="banner">Product banner</label>
                    <input type="file" name="banner" id="banner" value="{{ $product->banner }}" class="form-control">
                </div>
            </div>
        </div>
        <button style="min-width: 120px;" type="submit" class="btn btn-success mt-3">Save</button>
    </form>
@endsection