<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;


class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $images = Image::all();
        return $images;
    }

    public function show($id)
    {
        return Image::findOrFail($id);
    }

    public function store(Request $request)
    {
        $image_url = $this->upload($request->file('image'));

        $image = Image::create(['url' => $image_url, 'description' => $request->description]);

        return ['success' => true];
    }






    //Private Methods

    private function upload($file){
        $path = '/public/uploads/images/';
        $new_file_name = $this->generateFileName($file);

        if ($file->isValid()) {
            $response = $file->move(base_path($path), $new_file_name);
        }     

        return '/uploads/images/' . $new_file_name ;

    }

     private function generateFileName($file)
    {
        return str_random(10) . "-" . $file->getClientOriginalName();
    }
}
