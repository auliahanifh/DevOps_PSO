@extends('template')

@section('test1', 'Edit Product')

@section('link1')
<a href="/cart">Back</a>
@endsection

@section('konten')
    @foreach($keranjangbelanja as $cart)
	<form action="/cart/update" method="POST">
		{{ csrf_field() }}

        <input type="hidden" name="ID" id="ID" value="{{ $cart-> ID}}">

        <form>
            <div class="form-group row mb-3">
                <label for="KodeBarang" class="col-sm-2 col-form-label">Product Code</label>
                <div class="col-sm-10">
                  <input type="number" name="KodeBarang" class="form-control" id="KodeBarang" required="required" value="{{ $cart-> KodeBarang}}">
                </div>
            </div><div class="form-group row mb-3">
                <label for="Jumlah" class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-10">
                    <input type="number" name="Jumlah" class="form-control" id="Jumlah" required="required" value="{{ $cart-> Jumlah}}">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="Harga" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" name="Harga" class="form-control" id="Harga" required="required" value="{{ $cart-> Harga}}">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="totalharga" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10 d-flex align-items-center">
                    <input type="text" class="form-control" id="totalharga" placeholder="Total Harga" readonly>
                </div>
            </div>
            <center><button type="submit" class="btn btn-primary mt-2">Update Data</button></center>
        </form>
	</form>
    @endforeach
@endsection
