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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $blog->title }}</h6>
                <h6 class="mt-2 mb-0 text-xs text-info">
                    <a class="text-xs text-info" href="{{ route('blog.index') . '?c=' . $blog->category->slug }}">{{ $blog->category->name }}</a> | By:
                    <a class="text-xs text-info" href="{{ route('blog.index') . '?a=' . $blog->user->name }}">{{ $blog->user->name }}</a>
                </h6>
            </div>
            <div class="card-body">
                {!! $blog->body !!}
                <p class="mb-0 mt-3">
                    <a class="btn btn-outline-primary mr-2" href="{{ route('dashboard.index') }}">Back</a>
                    <a class="btn btn-outline-warning mr-2" href="{{ route('dashboard.edit', $blog->slug) }}">Edit</a>
                    <button class="btn btn-outline-danger mr-2" data-toggle="modal" data-target="#mydeleteBLogModal">Delete</button>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Earnings (Monthly) Card Example -->

    <!-- delete Modal-->
    <div class="modal fade" id="mydeleteBLogModal" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete {{ $blog->title }}?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('dashboard.destroy', $blog->slug) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</a>
                    </form>
                </div>
            </div>
        </div>  
    </div>
@endsection