<?php

namespace App\Http\Controllers;

use App\Models\Checkboox;
use App\Models\Eq;
use App\Models\Equipment;
use App\Models\Image;
use App\Models\Imageequipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function equipment()
    {
        $equipments = Equipment::all();

        return view("adminn.eq", compact('equipments'));
    }

    public function user()
    {
        return view("adminn.user");
    }

    public function check(){
        return view("checkboox");
    }

    public function store_check(Request $request){



        $roles=$request->checkboox;

        if ($roles) {

            foreach ($roles as $role) {
                $data = [
                    'id_user' => 1,
                    "role" => $role,
                ];
    
                Checkboox::create($data);


            }
        }else{
            dd("&&&&&s");

        }
        return redirect()->back();



             

    }

    public function store_equipment(Request $request, Image $image)
    {
        $images = $request->file("image");

        foreach ($images as $image) {
            $image->storePublicly('img/', 'public');
            $data = [
                "image" => $image->hashName(),
            ];

            Image::create($data);
        }
        return redirect()->back();
    }

    public function store_eq(Request $request)
    {
        request()->validate([
            'name' => ["required"],
            'stock' => ["required"],
            "img_url" => "required|image|mimes:png,jpg,jpeg,gif|max:2048"
        ]);

        $request->file("img_url")->storePublicly('img/', 'public');

        $data = [
            'name' => $request->name,
            'stock' => $request->stock,
            'state' => 1,
            "img_url" => $request->file("img_url")->hashName(),
        ];

        Equipment::create($data);

        return redirect()->back();
    }

    public function update_eq(Request $request, Equipment $equipment)
    {
        request()->validate([
            'name' => ["required"],
            'stock' => ["required"],
            'state' => ["required"],
            "img_url" => "image|mimes:png,jpg,jpeg,gif|max:2048"
        ]);

        if (($request->file('img_url')) != null) {

            // delete image from storage
            Storage::disk("public")->delete('img/'.$equipment->img_url);

            // update image
            $request->file("img_url")->storePublicly('img/', 'public');

            $data = [
                'name' =>  $request->name,
                'stock' => $request->stock,
                'state' => $request->state,
                "img_url" => $request->file("img_url")->hashName(),
            ];

            $equipment->update($data);


        }

        else{

            $data = [
                'name' =>  $request->name,
                'stock' => $request->stock,
                'state' => $request->state,
            ];

            $equipment->update($data);

        }

        return redirect()->back();

    }

    public function eq_destroy(Equipment $equipment)

    {
        Storage::disk("public")->delete('img/' . $equipment->img_url);
        $equipment->delete();
        return redirect()->back();

    }
}
