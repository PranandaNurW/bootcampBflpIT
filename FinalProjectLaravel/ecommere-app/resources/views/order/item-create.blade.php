@extends('layouts.admin')
    
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Add item to order ') . $order->invoice}}</h1>

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5">
                        <!-- /help text & error -->
                        
                        <!-- forms -->
                        <form method="POST" action="{{ route('item.store', $order->id) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_id" class="form-label">Product:</label>
                                <select class="custom-select @error('product_id') is-invalid @enderror" name="product_id" id="price" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id . "," . $product->price }}">{{ $product->name }} - @rupiah($product->price)</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" name="quantity" class="form-control form-control-user @error('quantity') is-invalid @enderror"
                                    value="{{ old('quantity') }}" id="quantity">
                                @error('quantity')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subtotal" class="form-label">Subtotal:</label>
                                <input type="number" name="subtotal" class="form-control form-control-user @error('subtotal') is-invalid @enderror"
                                    value="{{ old('subtotal') }}" id="subtotal" readonly>
                                @error('subtotal')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-user" type="submit">Add Product</button>
                        </form>
                        <!-- forms -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
@push('js-script')
    <script>
        const quantity = document.getElementById('quantity');
        const price = document.getElementById('price');
        const subtotal = document.getElementById('subtotal');
        
        function calculatePrice() {
            let productPrice = price.value.split(',');
            
            subtotal.value = parseInt(quantity.value) * parseInt(productPrice[1]);
        }

        quantity.addEventListener('change', calculatePrice);
        price.addEventListener('change', calculatePrice);
    </script>
@endpush    