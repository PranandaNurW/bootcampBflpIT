@extends('layouts.admin')
    
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit item to order ') . $order->invoice}}</h1>

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5">

                        <form method="POST" action="{{ route('order.item.update', ["order" => $item->order->id, "item" => $item->id]) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="subtotal" class="form-label">Price:</label>
                                <input type="number" name="price" class="form-control form-control-user @error('price') is-invalid @enderror"
                                    id="price" value="{{ $item->product->price }}" readonly>
                                @error('price')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" name="quantity" class="form-control form-control-user @error('quantity') is-invalid @enderror"
                                    id="quantity" value="{{ $item->quantity }}">
                                @error('quantity')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subtotal" class="form-label">Subtotal:</label>
                                <input type="number" name="subtotal" class="form-control form-control-user @error('subtotal') is-invalid @enderror"
                                    id="subtotal" value="{{ $item->subtotal }}" readonly>
                                @error('subtotal')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Edit</button>
                        </form>
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
            subtotal.value = parseInt(quantity.value) * parseInt(price.value);
        }

        quantity.addEventListener('change', calculatePrice);
        price.addEventListener('change', calculatePrice);
    </script>
@endpush    