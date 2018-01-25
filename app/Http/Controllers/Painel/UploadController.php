<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        $files = Storage::files('img');

        return view('painel.upload.index', compact('files'));
    }

    public function upload(Request $request)
    {
        $data = $request->all();

        $filesUp = $data['file'];

        foreach($filesUp as $file) {
            $name = $this->fileExists($file);

            Storage::putFileAs('/img', $file, $name);

            $this->resizeImage($name, 120);
        }
        
        return redirect()->back();
    }


    public function delete($file)
    {
        $file = str_replace("__", '/', $file);

        $file = Storage::delete($file);
        
        return redirect()->back();
    }

    private function fileExists($file)
    {
        $name           = $file->getClientOriginalName();
        $name           = str_replace(' ', '-', $name);

        $nameExtension  = FileController::nameExtension($name);
        $fileExists     = public_path('/img/'.implode('', $nameExtension));

        while(File::exists($fileExists)) {
            $nameExtension[0].= '_1';
            $fileExists = public_path('/img/'.implode('', $nameExtension));
        }

        return $nameExtension[0].$nameExtension[1];
    }

    private function resizeImage($name, $height)
    {
        $nameExtension      = FileController::nameExtension($name);

        $nameExtension[0]   = public_path('/img/thumb/'.$nameExtension[0]);

        if (!file_exists(public_path('/img/thumb/'))) {
            mkdir(public_path('/img/thumb/'), 0777, true);
        }

        $image = new ImageResize(public_path('/img/'.$name));
        $image->resizeToHeight($height);
        $image->save(implode('', $nameExtension));
    }
}
