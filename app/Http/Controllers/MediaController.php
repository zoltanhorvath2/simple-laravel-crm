<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function logoDeleter($requestID){
        $fileName = Company::select('logo_name')
            ->where('id', $requestID)
            ->value('logo_name');

        if(!$fileName){
            return false;
        }

        if(File::exists('assets/logos/' . $fileName)){
            File::delete('assets/logos/' . $fileName);
        }else{
            return back()->with(['error_message' => 'Hiba! A logo törlése sikertelen!']);
        }
    }
}
