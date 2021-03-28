@extends('layouts.app')
@section('content')

    <div class="container2">
        <h3>Wishlist</h3>
    <a href="{{route('wishlist.create')}}" class="btn btn-info">Add new product to wishlist</a>
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Name</td>
            </tr>
            </thead>
            <tbody>
            @php
                 $auth_id = Auth::user()->id;
            @endphp
            @foreach($wish = App\Wishlist::where(['user_id'=>$auth_id])->get() as $wishlist)

                <tr>
                    <td>{{$wishlist->products->name}}</td>
                   <td class="text-right">

                        <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-light" type="submit" onclick="return confirm('Remove from wishlist?')">Remove <i class="fas fa-heart"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
