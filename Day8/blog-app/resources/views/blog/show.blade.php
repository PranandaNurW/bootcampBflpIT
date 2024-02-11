@extends('layouts.main')
@section('container')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        {{ $title }}
    </h1>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="row">
    <div class="col-lg-12 d-flex">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4 flex-fill">
            <div class="card-header py-3 text-center">
                <img src="{{ asset('storage/images/' . $blog->image) }}" class="w-50 rounded mb-4" alt="">
                <h6 class="m-0 font-weight-bold text-primary">{{ $blog->title }}</h6>
                <h6 class="mt-2 mb-0 text-xs text-info">
                    <a class="text-xs text-info" href="{{ route('blog.index') . '?c=' . $blog->category->slug }}">{{ $blog->category->name }}</a> | By:
                    <a class="text-xs text-info" href="{{ route('blog.index') . '?a=' . $blog->user->name }}">{{ $blog->user->name }}</a>
                </h6>
            </div>
            <div class="card-body">
                {!! $blog->body !!}
                <p class="mb-0 mt-3"><a class="btn btn-outline-primary" href="{{ route('blog.index') }}">Back</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Earnings (Monthly) Card Example -->
@endsection