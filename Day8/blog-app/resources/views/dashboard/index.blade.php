@extends('layouts.main')
@section('container')
<!-- Begin Page Content -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ auth()->user()->name }}'s Blog Dashboard
        </h1>
        <a href="{{ route('dashboard.create') }}" class="btn btn-outline-primary">+ Add Blog</a>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-s" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->category->name }}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-info" href="{{ route('dashboard.show', $blog->slug) }}">Detail</a>
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('dashboard.edit', $blog->slug) }}">Edit</a>
                                <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#mydeleteBLogModal-{{ $blog->id }}">Delete</button>
                            </td>
                        </tr>
                            <!-- delete Modal-->
                            <div class="modal fade" id="mydeleteBLogModal-{{ $blog->id }}" role="dialog">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
    
@endsection
            