<?php
namespace App\Traits;


use Intervention\Image\Facades\Image as Image;
use Intervention\Image\ImageManager;

Trait PosTrait{
    public static function fileRename(){
        return now()->format("Y-m-d")."a_n".time().rand(1111,9999);
    }
    public static function FileProcessing($file,$folderPath=null,$height=600,$width=600){
        $dynamicPath = public_path($folderPath);
        if (!file_exists($dynamicPath)){
            mkdir($dynamicPath,0777,TRUE);
        }
        $extension = $file->getClientOriginalExtension();
        $fileName = self::fileRename().'.'.$extension;
        $img = Image::make($file->path());
        if ($extension != "gif"){
            $img->resize(150,150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dynamicPath.'/'.$fileName);
        }else{
            $file->move($dynamicPath."/".$fileName);
        }
        return $folderPath.$fileName;
    }
}
