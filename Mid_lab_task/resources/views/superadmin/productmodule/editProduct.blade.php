@extends('superadmin.master')

 @section('title')
     Admin || Dashboard
 @endsection
 
 @section('content')
    <div class="container text-center">
        <h2>Add Products</h2>
        <div class="col-md-12  ">
            @include('include.alert')
            <form action="{{ route('product.addProducts') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="product_name" value="{{ $data->product_name }}" placeholder="Product name">
                </div>
                <span class="text-danger">@error('product_name'){{ $message }}@enderror</span>
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="unit_prics" value="{{ $data->unit_prics }}" placeholder="Unit Prics">
                </div>
                <span class="text-danger">@error('unit_prics'){{ $message }}@enderror</span>
                <div class="form-group">
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                    <option value="1">Shirt</option>
                    <option value="2">jeans</option>
                    <option value="3">T-Shirt</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="quantity" autocomplete="quantity" value="{{ old('quantity') }}" placeholder="quantity">
                </div>
                <span class="text-danger">@error('quantity'){{ $message }}@enderror</span>
                
                <div class="form-group">
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option value="existing">existing</option>
                    <option value="upcoming">upcoming</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="vendor_id" class="form-control" id="exampleFormControlSelect1">
                    <option value="1">vendor-1</option>
                    <option value="2">vendor-2</option>
                    <option value="3">vendor-3</option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
 @endsection

