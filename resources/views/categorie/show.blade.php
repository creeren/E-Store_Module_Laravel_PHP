@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <li class="list-group-item">ID: {{$categorie->id ?? ''}}</li>
        <li class="list-group-item">NAME: {{$categorie->name ?? ''}}</li>
    </ul>
    <form>
        <button class="btn-back" type="submit" formaction="{{ route('categorie.index') }}">Back</button>
    </form>
@endsection
