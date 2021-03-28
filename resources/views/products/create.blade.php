
@extends('layouts.app')
@section('content')
    @isset($product)
    <h3>Edit product</h3>
    @else
    <h3>Add new product</h3>
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
    @isset($product)
        @method("PATCH")
    @endisset

    <form>
        <div class="form-group">
            <label>Article*</label><br>
            <label>
                <input type="text" class="form-control" name="article" value="{{ $product->article ?? '' }}"/>
            </label>
        </div>
        <div class="form-group">
                <label>Categorie*</label><br>
            <label>
                <select name="categories_id"  style="width: 185px;" class="form-control">
                    <option disabled hidden selected>Please select categorie</option>
                    @foreach (\App\Categorie::all() as $categorie)
                        <option value="{{ $categorie->id }}" {{isset($product) && $product->categories->id == $categorie->id ? 'selected': ''}}>{{ $categorie->name}}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>Name*</label><br>
            <label>
                <input type="text" class="form-control" name="name" value="{{ $product->name ?? '' }}"/>
            </label>
        </div>
        <div class="form-group">
            <label>Quantity*</label><br>
            <label>
                <input type="number" class="form-control" name="quantity" value="{{ $product->price ?? '' }}"/>
            </label>
        </div>
        <div class="form-group">
            <label>Price*</label><br>
            <label>
                <input type="text" class="form-control" name="price" value="{{ $product->quantity ?? '' }}"/>
            </label>
        </div>
        <div class="form-group">
            <label>Made in*</label><br>
            <label>
                <input type="radio" name="country" <?php if (isset($country) && $country=="Europe") {echo "checked";}?> value="Europe">
            </label>Europe
            <label>
                <input type="radio" name="country" <?php if (isset($country) && $country=="Us") echo "checked";?> value="Usa">
            </label>USA
            <label>
                <input type="radio" name="country" <?php if (isset($country) && $country=="Other") echo "checked";?> value="Other">
            </label>Other
        </div>
        <form>
            <button class="btn-save" action="action" type="submit">Save</button>
            @isset($product)
            @else
                <button class="btn-reset" type="reset"  value="reset" >Reset</button>
            @endisset
            </form>
        </form>
        <form>
            <button class="btn-back" type="submit" formaction={{ route('index.index') }}>Back</button>
        </form>

    </form>

@endsection

