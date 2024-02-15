@extends('layouts.admin')

@push('css-script')
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endpush    
    
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create order') }}</h1>

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5">
                        <!-- /help text & error -->
                        
                        <!-- forms -->
                        <form method="POST" action="{{ route('order.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="user" class="form-label">User:</label>
                                <select class="custom-select @error('user_id') is-invalid @enderror" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status:</label>
                                <select class="custom-select @error('status') is-invalid @enderror" name="status" id="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="on_progress" disabled>On Progress</option>
                                    <option value="paid" disabled>Paid</option>
                                    <option value="delivered" disabled>Delivered</option>
                                    <option value="done" disabled>Done</option>
                                    <option value="cancel" disabled>Cancel</option>
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
                                    value="{{ old('date') }}" id="date">
                                @error('date')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-user" type="submit">Add Order</button>
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