@extends('template')

@section('test1', 'Add Product')

@section('link1')
<a href="/cart"> Back</a>
@endsection

@section('konten')
	<form action="/cart/store" method="POST">
		{{ csrf_field() }}

        <form>
            <div class="form-group row mb-3">
                <label for="KodeBarang" class="col-sm-2 col-form-label">Product Code</label>
                <div class="col-sm-10">
                  <input type="text" name="KodeBarang" class="form-control" id="KodeBarang" required="required" placeholder="Fill the code">
                </div>
            </div><div class="form-group row mb-3">
                <label for="Jumlah" class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-10">
                    <input type="number" name="Jumlah" class="form-control" id="Jumlah" required="required" placeholder="Fill the amount">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="Harga" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" name="Harga" class="form-control" id="Harga" required="required" placeholder="Fill the price">
                </div>
            </div>
            <center><button type="submit" class="btn btn-primary mt-2">Add</button></center>
        </form>
	</form>
@endsection
