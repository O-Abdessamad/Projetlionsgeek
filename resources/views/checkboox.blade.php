@extends('layouts.index')

@section('content')
    <h1 class=" container">Test checkboox</h1>
    <a href={{ route('user.user') }}>add user</a>

    <form class=" container w-75" action={{route("equipment.store_check")}} method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <input class="form-control" type="text" name="name" id="name" required> --}}

        <div class="form-check">
            <input class="form-check-input" name="checkboox[]" type="checkbox" value="admin" id="checkboox">
            <label class="form-check-label" for="checkboox">
                Admin
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="checkboox[]" type="checkbox" value="aestionaire" id="checkboox" >
            <label class="form-check-label" for="checkboox">
                Gestionaire
            </label>
        </div>


        <button class="btn btn-info mt-1" type="submit"> Add </button>

        
    </form>
@endsection
