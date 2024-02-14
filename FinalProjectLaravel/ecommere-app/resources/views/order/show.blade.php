@extends('layouts.admin')

@push('css-script')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit items of order ') . $order->invoice }}</h1>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product name</th>
                                    <th>Product quantity</th>
                                    <th>Product subtotal</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $orderItem)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $orderItem->product->name }}</td>
                                    <td>{{ $orderItem->quantity }}</td>
                                    <td>{{ $orderItem->subtotal }}</td>
                                    <td>{{ $orderItem->created_at }}</td>
                                    <td>
                                        <button class="btn btn-info">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection