
@extends('layouts.app')
@section('content')
    <ul class="list-group">
         @can('view', App\Product::class)
            <li class="list-group-item">ID: {{$product->id ?? ''}}</li>
         @endcan
             <li class="list-group-item">ARTICLE: {{$product->article ?? ''}}</li>
             <li class="list-group-item">NAME: {{$product->name ?? ''}}</li>
         @can('view', App\Product::class)
                 <li class="list-group-item">QUANTITY: {{$product->quantity ?? ''}}</li>
         @endcan
             <li class="list-group-item">PRICE: {{$product->price ?? ''}}</li>
             <li class="list-group-item">COUNTRY: {{$product->country ?? ''}}</li>
    </ul>
         <form>
             <button class="btn-back" type="submit" formaction="{{ route('index.index') }}">Back</button>
         </form>

@endsection
