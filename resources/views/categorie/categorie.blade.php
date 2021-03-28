@extends('layouts.app')
@section('content')

    <div class="container2">
        <h3>Categories</h3>
        @can('create', App\Categorie::class)
            <a href="{{route('categorie.create')}}" class="btn btn-info">Add new Category</a>
        @endcan
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


            @foreach($categorie as $cat)
                <tr>
                    <td>{{$cat->name}}</td>
                    <td class="text-right">

                        <a href="{{route('categorie.show', $cat->id)}}" class="btn btn-primary"><i class="fas fa-search"></i></a>
                        @can('update', $cat)
                            <a href="{{ route('categorie.edit', $cat->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('destroy', $cat)
                            <form action="{{ route('categorie.destroy', $cat->id) }}" method="post" class="d-inline">
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
    </div>






@endsection
