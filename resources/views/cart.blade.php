@extends('template')

@section('test1', 'PT. XYZ')

@section('link1')
    <a href="/add" class="btn btn-primary"> + Add Product</a>
@endsection

@section('konten')
	<form method="GET" action="{{ url('/search') }}">
    <div class="row mb-3 align-items-end">
        <div class="col-md-6">
            <label for="search" class="form-label">Search</label>
            <input type="text" id="search" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Search">
        </div>
        <div class="col-md-3">
            <label for="pagination" class="form-label">Items per page</label>
            <input type="number" id="pagination" name="pagination" value="{{ $keranjangbelanja->perPage() }}" class="form-control" min="1" max="100">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success w-100">Submit</button>
        </div>
    </div>
    </form>
    <br>

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Product Code</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        @foreach($keranjangbelanja as $cart)
        <tr>
            <td>{{ $cart->ID }}</td>
            <td>{{ $cart->KodeBarang }}</td>
            <td>{{ $cart->Jumlah }}</td>
            <td>
                Rp{{ number_format($cart->Harga, 0, '.', ',') }}
            </td>
            <td>
                Rp{{ number_format($cart->Jumlah * $cart->Harga) }}
            </td>
            <td class="text-left">
                <a href="/edit/{{ $cart->ID }}" class="btn btn-info btn-icon">Edit</a>
                <a href="/delete/{{ $cart->ID }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

@if ($keranjangbelanja->lastPage() > 1)
    <div style="float: right;">
        {{-- Previous Page Link --}}
        @if ($keranjangbelanja->onFirstPage())
            « Previous
        @else
            <a href="{{ $keranjangbelanja->previousPageUrl() }}">« Previous</a>
        @endif

        &nbsp;|&nbsp;

        {{-- Next Page Link --}}
        @if ($keranjangbelanja->hasMorePages())
            <a href="{{ $keranjangbelanja->nextPageUrl() }}">Next »</a>
        @else
            Next »
        @endif
    </div>
@endif

    <br/>
    Page : {{ $keranjangbelanja->currentPage() }} <br/>
    Data Amount : {{ $keranjangbelanja->total() }} <br/>
    Data Per Page : {{ $keranjangbelanja->perPage() }} <br/>
    Showing {{ $keranjangbelanja->firstItem() }} to {{ $keranjangbelanja->lastItem() }} of {{ $keranjangbelanja->total() }} results <br/>
    <br/>
@endsection
