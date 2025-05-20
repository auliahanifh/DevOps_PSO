@extends('template')

@section('test1', 'PT. XYZ')

@section('link1')
    <a href="/cart/add" class="btn btn-primary"> + Add Product</a>
@endsection

@section('konten')
	<form action="/cart/search" method="GET">
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Product</label>
            <div class="col-sm-6">
                <input type="text" name="cari" class="form-control" id="cari" placeholder="Search .." value="{{ request('cari') }}">
            </div>
            <div class="col-sm-4">
                <input type="submit" class="btn btn-success">
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
                <a href="/cart/edit/{{ $cart->ID }}" class="btn btn-info btn-icon">Edit</a>
                <a href="/cart/delete/{{ $cart->ID }}" class="btn btn-danger">Delete</a>
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
