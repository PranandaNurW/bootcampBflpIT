@extends('layouts.admin')

@push('css-script')
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endpush    
    
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create product') }}</h1>

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5">
                        <!-- /help text & error -->
                        
                        <!-- forms -->
                        <form method="POST" action="{{ route('product.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror"
                                    placeholder="Enter name..." value="{{ old('name') }}" id="name" required>
                                @error('name')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="description" class="form-control form-control-user @error('description') is-invalid @enderror"
                                    placeholder="Enter description..." value="{{ old('description') }}" id="description" required>
                                <trix-editor input="description"></trix-editor>
                                {{-- <textarea type="text" name="description" class="form-control form-control-user @error('description') is-invalid @enderror"
                                    placeholder="Enter description..." value="{{ old('description') }}" id="description" required></textarea> --}}
                                @error('description')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category" class="form-label">Status:</label>
                                <select class="custom-select @error('status') is-invalid @enderror" name="status" id="status" required>
                                    <option value="draft">Draft</option>
                                    <option value="publish">Publish</option>
                                </select>
                                @error('status')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category" class="form-label">Category:</label>
                                <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" name="price" class="form-control form-control-user @error('price') is-invalid @enderror"
                                    placeholder="Enter price..." value="{{ old('price') }}" id="price" required>
                                @error('price')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" name="weight" class="form-control form-control-user @error('weight') is-invalid @enderror"
                                    placeholder="Enter weight..." value="{{ old('weight') }}" id="weight" required>
                                @error('weight')
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
    <script src="{{ asset('js/trix.js') }}"></script>
@endpush    