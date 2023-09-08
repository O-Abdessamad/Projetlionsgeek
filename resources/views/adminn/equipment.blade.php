

@extends('layouts.index')

@section('content')

<h1 class=" container">Ajouter Equipment</h1>
<a href={{route("user.user")}} >add user</a>

<form class=" container w-75" action={{route("equipment.store_equipment")}} method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name" class="form-label">Name</label>
        <input class="form-control" type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="stock" class="form-label">Stock</label>
        <input class="form-control" type="number" name="stock" id="stock" cols="30" rows="10" required>
    </div>

    <div>
        <label for="image" class="form-label">Image</label>

        {{-- <input class="form-control" type="text" name="img_url" id="img_url" cols="30" rows="10" required> --}}
        <input class="form-control" type="file" name="image[]" multiple  id="image" cols="30" rows="10" required>
    </div>
    
   
    <button class="btn btn-info mt-1" type="submit">Add </button>
</form>

@endsection

