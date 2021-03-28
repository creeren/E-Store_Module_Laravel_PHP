@extends('layouts.app')
@section('content')
    @isset($wishlist)
        <h3>Edit wishlist</h3>
    @else
        <h3>Add new product to wishlist</h3>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <h3 class="alert-heading">Please make sure all required fields are filled out correctly!</h3>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{$action}}">
        @csrf
        @isset($wishlist)
            @method("PATCH")
        @endisset

        <form>
            <div class="row">
                <div class="col">
                    <label>Id*</label>
                    <label>
                        <select name="product_id"  style="width: 185px;" class="form-control">
                            <option disabled hidden selected>Please select product</option>
                            @foreach (\App\Product::all() as $product)
                                <option value="{{ $product->id }}" {{isset($wishlist) && $wishlist->products->id == $product->id ? 'selected': ''}}>{{ $product->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>


            <form>
                <button class="btn-save" action="action" type="submit">Save</button>
            </form>
        </form>
    </form>
@endsection

