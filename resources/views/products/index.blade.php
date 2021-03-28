
@extends('layouts.app')
@section('content')

    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">

        </form>
    </nav>
    {{--<form action="/search" method="get" class="d-inline">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button><br>
    </form>--}}



   <div class="product-cat-container">
    <div class="cat-container">
        <div class="list-group" style="width: 150px">
            <p class="search-cat">By Category</p>
            @foreach ($categories as $cat)
                <a class="list-group-item list-group-item-action"  href="{{route('index.index',['categorie'=>$cat->name])}}">{{$cat->name}}</a>
            @endforeach
        </div>
    </div>
       <div class="product-container">
        <h3>Products</h3>
           @can('create', App\Product::class)
           <a href="{{route('index.create')}}" class="btn btn-info">Add new product</a>
            @endcan
           @if(session()->get('success'))

               <div class="alert alert-success">
                   {{session()->get('success')}}
               </div>
           @endif
    <table class="table table-striped">
        <thead>
        <tr>
            @can('view', App\Product::class)
                <td>ID</td>
            @endcan
            <td>Category</td>
            <td>Article</td>
            <td>Name</td>
            @can('view', App\Product::class)
                 <td>Quantity</td>
            @endcan
            <td>Price</td>
            <td>Country</td>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)

            <tr>
                @can('view', App\Product::class)
                    <td>{{$product->id}}</td>
                @endcan
                <td>{{$product->categories->name}}</td>
                <td>{{$product->article}}</td>
                <td>{{$product->name}}</td>
                @can('view', App\Product::class)
                    <td>{{$product->quantity}}</td>
                @endcan
                <td>{{$product->price}}</td>
                <td>{{$product->country}}</td>
                <td class="text-right">

                    <a href="{{route('index.show', $product->id)}}" class="btn btn-primary"><i class="fas fa-search"></i></a>
                    @can('update', $product)
                        <a href="{{ route('index.edit', $product->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    @endcan

                    @php
                        $count = App\Wishlist::where(['product_id'=>$product->id, 'user_id'=> $auth_id = Auth::id()])->count();
                    @endphp

                    @if($count==0)

                        <form action="{{ route('addWishlist', $product->id) }}" method="post" class="d-inline">
                             @csrf
                            <button class="btn btn-light" type="submit" id="heart">
                                <i class="far fa-heart"></i>
                    @endif
                    @if($count>0 && Auth::check())
                                    <i class="fas fa-heart">Wishlisted</i>
                    @endif
                            </button>
                        </form>

                    @can('destroy', $product)
                        <form action="{{ route('index.destroy', $product->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Delete permanently?')"><i class="fas fa-trash-alt"></i></button>
                         </form>
                    @endcan

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        @if($plaginate==true)
            {{$products->links()}}
           @endif
</div>
   </div>

@endsection



