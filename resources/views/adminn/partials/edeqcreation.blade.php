<button type="button" class="btn btn-warning text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$equipment->id}}">
    Edit </button>


<div class="modal fade" id="staticBackdrop{{$equipment->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdrop{{$equipment->id}}Label" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdrop{{$equipment->id}}Label">Modifier Equipment</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form class=" container w-75" action={{route("equipment.update_eq" , $equipment->id )}} method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div>
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$equipment->name}}" required>
                </div>

                <div>
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control" type="number" min="0" name="stock" id="stock" value="{{$equipment->stock}}" cols="30"
                        rows="10" required>
                </div>

                <div>
                    <label for="state" class="form-label">Etat</label>
                    <input class="form-control" min="0" max="1" type="number" name="state" id="state" value="{{$equipment->state}}" cols="30"
                        rows="10" required>
                </div>

                <div>
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" name="img_url" id="img_url" cols="30"
                        rows="10" >
                </div>


                <button class="btn btn-info mt-1" type="submit">Modifier </button>
            </form>

        </div>
    </div>
</div>
</div>