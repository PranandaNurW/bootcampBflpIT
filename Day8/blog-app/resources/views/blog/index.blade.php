@extends('layouts.main')
@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show text-s" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        {{ $title }}
    </h1>
</div>
<a class="text-s text-info" href="#">All Categories</a>

@if ($blogs->count())
<!-- Earnings (Monthly) Card Example -->
<div class="row mt-3">
    @foreach ($blogs as $blog)
    <div class="col-lg-4 d-flex">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4 flex-fill">
            <div class="card-header py-3">
                <img src="{{ asset('storage/images/' . $blog->image) }}" class="img-fluid rounded mb-4" alt="">
                <h6 class="m-0 font-weight-bold text-primary">{{ $blog->title }}</h6>
                <h6 class="mt-2 mb-0 text-xs text-info">
                    <a class="text-xs text-info" href="{{ route('blog.index') . '?c=' . $blog->category->slug }}">{{ $blog->category->name }}</a> | By:
                    <a class="text-xs text-info" href="{{ route('blog.index') . '?a=' . $blog->user->name }}">{{ $blog->user->name }}"</a>
                </h6>
            </div>
            <div class="card-body">
                {{ $blog->excerpt }}
                <p class="mb-0 mt-2"><a class="text-primary" href="{{ route('blog.show', $blog->slug) }}">More details >></a></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<p class="text-center text-lg">No post found.</p>
@endif
<!-- Earnings (Monthly) Card Example -->

@endsection
            