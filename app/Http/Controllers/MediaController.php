<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    public $newLogoName;

    public function logoProcessor(Request $request){
        if($request->hasFile('logo')){
            //Add new logo name based on unix timestamp
            $this->newLogoName = time() . '.' . $request->logo->extension();
            //Resize logo using Image facade and move logo into public folder
            $resized = Image::make($request->logo->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resized->save(public_path('assets/logos/'). $this->newLogoName);
        }else{
            return back()->with(['error_message' => 'Hiba! A kép feltöltése sikertelen!']);
        }
    }
}
