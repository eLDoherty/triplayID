@extends('layout.admin')

@section('content')
    <div class="upload-banner-wrapper">
        <h1 class="mt-5 mb-4">Manage Banner</h1>
        @if($banners)
          <table class="table table-striped table-dark mt-3 mb-5">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 0; @endphp
              @foreach($banners as $banner)
              @php $i++ @endphp
                <tr>
                  <th scope="row">{{ $i }}</th>
                  <td><img src="{{ asset('storage/uploads/banner/' . $banner->image) }}"></td>
                  <td><a class="btn btn-danger" href="/deleteBanner/{{ $banner->id }}">Delete</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
        <form style="display: flex; flex-direction: column; max-width: 350px;" enctype="multipart/form-data" method="post" action="{{ route('imageBanner') }}" >
            @csrf
            @if (session()->has('bannerStatus'))
                <h3 class="text-danger mt-3">{{ session('bannerStatus') }}</h3>
            @endif
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
            <input class="mb-4 form-control" type="file" name="image" id="image" required>
            <button type="submit" class="btn btn-success">Add banner</button>
        </form>
    </div>

    <div class="upload-slider-wrapper">
        <h1 class="mt-5 mb-4">Edit sliders</h1>
        @if($sliders)
          <table class="table table-striped table-dark mt-3 mb-5">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 0; @endphp
                @foreach($sliders as $slider)
                @php $i++; @endphp
                  <tr>
                    <th scope="row">{{ $i }}</th>
                    <td><img src="{{ asset('storage/uploads/slider/' . $slider->image) }}"></td>
                    <td><a class="btn btn-danger" href="/deleteSlider/{{ $slider->id }}">Delete</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        <form style="display: flex; flex-direction: column; max-width: 350px;" enctype="multipart/form-data" method="post" action="{{ route('imageSlider') }}" >
            @csrf
            @if (session()->has('sliderStatus'))
                <h3 class="text-danger mt-3">{{ session('sliderStatus') }}</h3>
            @endif
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
            <input class="mb-4 form-control" type="file" name="image" id="image" required>
            <button type="submit" class="btn btn-success">Add slider</button>
        </form>
    </div>

    <div class="upload-slider-wrapper">
      <h1 class="mt-5 mb-4">Edit Payment Logo</h1>
      <table class="table table-striped table-dark mt-3 mb-5">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Image</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 0; @endphp
            @foreach($payments as $wallet)
            @php $i++ @endphp
              <tr>
                <th scope="row">{{ $i }}</th>
                <td><img src="{{ asset('storage/uploads/payment/' . $wallet->image) }}"></td>
                <td><h4 class="fw-400">{{ $wallet->type }}</h4></td>
                <td><a class="btn btn-danger" href="/deletePayment/{{ $wallet->id }}">Delete</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      <form style="display: flex; flex-direction: column; max-width: 350px;" enctype="multipart/form-data" method="post" action="{{ route('imagePayment') }}" >
          @csrf
          @if (session()->has('paymentStatus'))
              <h3 class="text-danger mt-3">{{ session('paymentStatus') }}</h3>
          @endif
          @if ($errors->has('image'))
              <span class="text-danger">{{ $errors->first('image') }}</span>
          @endif
          <input class="mb-4 form-control" type="file" name="image" id="image" required>
          <label for="type" class="mb-2">Bank type</label>
          <select selected="bank" name="type" id="type" class="form-control mb-4">
              <option value="bank">Bank</option>
              <option value="virtual">Virtual</option>
          </select>
          <button type="submit" class="btn btn-success">Add payment</button>
      </form>
    </div>

    <div class="upload-slider-wrapper">
      <h1 class="mt-5 mb-4">Add url embeded</h1>
      @if($urls)
        <table class="table table-striped table-dark mt-3 mb-5">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Url</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 0; @endphp
              @foreach($urls as $url)
              @php $i++; @endphp
                <tr>
                  <th scope="row">{{ $i }}</th>
                  <td><a href="{{ $url->url }}">{{ $url->url }}</a></td>
                  <td><a class="btn btn-danger" href="/deleteEmbed/{{ $url->id }}">Delete</a></td>
                </tr>
              @endforeach
          </tbody>
        </table>
      @endif
      <form style="display: flex; flex-direction: column; max-width: 350px;" enctype="multipart/form-data" method="post" action="{{ route('addUrl') }}" >
          @csrf
          @if (session()->has('embedStatus'))
              <h3 class="text-danger mt-3">{{ session('embedStatus') }}</h3>
          @endif
          @if ($errors->has('url'))
              <span class="text-danger">{{ $errors->first('url') }}</span>
          @endif
          <input class="mb-4 form-control" type="text" name="url" id="url" required placeholder="Embed video">
          <button type="submit" class="btn btn-success">Add URL</button>
      </form>
  </div>

  <div class="product-wrapper mt-5 mb-5">
      @if (session()->has('productStatus'))
          <span class="text-danger">{{ session('productStatus') }}</span>
      @endif
      <h2>My Products</h2>
      @if($products)
        <table class="table table-striped table-dark mt-3">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 0; @endphp
              @foreach($products as $product)
              @php $i++; @endphp
                <tr>
                  <th scope="row">{{ $i }}</th>
                  <td><h3>{{ $product->name }}</h3></td>
                  <td><img src="{{ asset('storage/uploads/product/' . $product->thumbnail) }}"></td>
                  <td><p>{{ $product->description }}</p></td>
                  <td><a class="btn btn-danger mb-2" href="/deleteProduct/{{ $product->id }}">Delete</a> | 
                      <a class="btn btn-info mb-2" href="/editProduct/{{ $product->id }}">Edit</a> |
                      <a class="btn btn-success mb-2" href="/addPrice/{{ $product->id }}">Price Setting</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
        <a class="btn btn-success" href="/product">Add Product</a>
    </div>

@endsection