@extends('layouts.admin')

@push('css-script')
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endpush    
    
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit order' ) . $order->invoice }}</h1>

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5">
                        <!-- /help text & error -->
                        
                        <!-- forms -->
                        <form method="POST" action="{{ route('order.update', $order->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="status" class="form-label">Status:</label>
                                <select class="custom-select @error('status') is-invalid @enderror" name="status" id="status" required>
                                    <option @if ($order->status == "pending") selected @endif value="pending">Pending</option>
                                    <option @if ($order->status == "on_progress") selected @endif value="on_progress">On Progress</option>
                                    <option @if ($order->status == "paid") selected @endif value="paid">Paid</option>
                                    <option @if ($order->status == "delivered") selected @endif value="delivered">Delivered</option>
                                    <option @if ($order->status == "done") selected @endif value="done">Done</option>
                                    <option @if ($order->status == "cancel") selected @endif value="cancel">Cancel</option>
                                </select>
                                @error('status')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date" class="form-label">Date:</label>
                                <input type="date" name="date" class="form-control form-control-user @error('date') is-invalid @enderror"
                                    value="{{ $order->date }}" id="date">
                                @error('date')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-info btn-user" type="submit">Edit Product</button>
                        </form>
                        <!-- forms -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-script')
    <script src="{{ asset('js/trix.js') }}" rel="stylesheet"></script>
@endpush    