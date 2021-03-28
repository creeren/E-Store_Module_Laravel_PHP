@extends('layouts.app')
@section('content')
    @isset($cat)
        <h3>Edit Category</h3>
    @else
        <h3>Add new Category</h3>
    @endisset

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
        @isset($cat)
            @method("PATCH")
        @endisset
        <form>

            <div class="row">
                <div class="col">
                    <label>Name*</label>
                    <label>
                        <input type="text" class="form-control" name="name" value="{{ $cat->name ?? '' }}"/>
                    </label>
                </div>

            </div>
            <form>
                <button class="btn-save" action="action" type="submit">Save</button>
                @isset($cat)
                @else
                <button class="btn-reset" type="reset"  value="reset" >Reset</button>
                    @endif
            </form>
        </form>
        <form>
            <button class="btn-back" type="submit" formaction={{ route('categorie.index') }}>Back</button>
        </form>
    </form>

@endsection

