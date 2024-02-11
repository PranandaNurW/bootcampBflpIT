@extends('layouts.main')
@section('container')
<!-- Begin Page Content -->


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ $title }}
        </h1>
    </div>

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5">
                        <!-- /help text & error -->
                        
                        <!-- forms -->
                        <form method="POST" action="{{ route('dashboard.update', $blog->slug) }}" autocomplete="off" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control form-control-user @error('title') is-invalid @enderror"
                                    placeholder="Enter title..." value="{{ old('title', $blog->title) }}" id="title" required>
                                @error('title')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="slug" class="form-control form-control-user @error('slug') is-invalid @enderror"
                                    placeholder="Enter slug..." value="{{ old('slug', $blog->slug) }}" id="slug" required>
                                @error('slug')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category" class="form-label">Category:</label>
                                <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" required>
                                    @foreach ($categories as $category)
                                        @if(old('category_id', $blog->category_id)==$category->id)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="body" class="form-control form-control-user @error('body') is-invalid @enderror"
                                    placeholder="Enter body..." value="{{ old('body', $blog->body) }}" id="body" required>
                                <trix-editor input="body"></trix-editor>
                                @error('body')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img src="{{ $blog->image ? asset('storage/images/' . $blog->image) : "#" }}" alt="" id="preview">
                                <input type="file" name="image" class="form-control form-control-user @error('image') is-invalid @enderror"
                                    placeholder="Upload image..." value="{{ old('image') }}" id="image" readonly required>
                                @error('image')
                                <div class="ml-3 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <button class="btn btn-primary btn-user" type="submit">Edit Post</button>
                        </form>
                        <!-- forms -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->

<script>
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');
    const image = document.getElementById('image');
    const preview = document.getElementById('preview');

    title.addEventListener('change', function(){
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    
    image.addEventListener('change', function(event){
        preview.style.display = 'block';
        const [file] = image.files;
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    });
</script>
@endsection