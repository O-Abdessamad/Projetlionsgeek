@extends('layouts.index')

@section('content')
<a href={{ route('user.user') }}>add user</a> <br>
<a href={{ route("checkboox.check") }}>checkboox</a>


<div class=" text-center  mb-5">
    <h1 class=" container">Ajouter Equipment</h1>
    <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Ajouter Equipment </button>
</div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter Equipment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class=" container w-75" action={{ route('equipment.store_eq') }} method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>

                        <div>
                            <label for="stock" class="form-label">Stock</label>
                            <input class="form-control" min="0" type="number" name="stock" id="stock" cols="30"
                                rows="10" required>
                        </div>

                        <div>
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="img_url" id="img_url" cols="30"
                                rows="10" required>
                        </div>


                        <button class="btn btn-info mt-1" type="submit">Add </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de l'equipment</th>
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Etat</th>
                <th scope="col">Edite</th>
                <th scope="col">Supprimez un equipment</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($equipments as $equipment )

            <h1>  </h1>

            <tr valign="middle">
                <th scope="row">{{$loop->iteration}}</th>
                <td> {{$equipment->name}} </td>
                <td> {{$equipment->stock}} </td>

                <td>
                    image : {{$equipment->img_url}}
                </td>

                <td>
                    @if ($equipment->state===1)
                        <span class=" bg-success text-light rounded-2 p-1">Khedama</span>
                    @else
                    <span  class=" bg-danger text-light rounded-2 p-1">Khastra</span>

                        
                    @endif
                </td>

                <td>
                    @include("adminn.partials.edeqcreation")
                </td>

                <td>
                    <form action={{route( "equipment.eq_destroy" ,$equipment->id)}} method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class=" btn btn-danger text-white ">Supprimer</button>
                    </form>
                </td>
            </tr>
                
            @endforeach

           
        </tbody>
    </table>

@endsection
