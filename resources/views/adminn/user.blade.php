@extends('layouts.index')

@section('content')
    <h1 class=" container">Ajouter un Utilisateur</h1>
    <a href={{ route('equipment.equipment') }}>add equipment</a>


    <form class=" container w-75" action="" method="POST">
        @csrf

        <div>
            <label for="name" class="form-label">Name</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="last_name" class="form-label">Last name</label>
            <input class="form-control" type="number" name="last_name" id="last_name" cols="30" rows="10"
                required>
        </div>

        <div>
            <label for="age" class="form-label">Age</label>
            <input class="form-control" type="number" name="age" id="age" multiple cols="30" rows="10"
                required>
        </div>

        <div>
            <label for="cin" class="form-label">Cin</label>
            <input class="form-control" type="text" name="cin" id="cin" cols="30" rows="10" required>
        </div>

        <div>
            <label for="gender" class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender">
                <label class="form-check-label" for="gender">
                    M
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender">
                <label class="form-check-label" for="gender">
                    F
                </label>
            </div>
        </div>

        <div>
            <label for="phone" class="form-label">Phone</label>
            <input class="form-control" type="text" name="phone" id="phone" cols="30" rows="10" required>
        </div>

        <div>
            <label for="phone" class="form-label">Type</label>
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="type" id="user_interne">
                <label class="form-check-label" for="user_interne">
                    User interne
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="type" id="user_externe">
                <label class="form-check-label" for="user_externe">
                    User externe
                </label>
            </div>
        </div>







        <button class="btn btn-info mt-1" type="submit">Add </button>
    </form>
@endsection
