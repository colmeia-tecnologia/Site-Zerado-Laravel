<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
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
            $name = $file->getClientOriginalName();

            Storage::putFileAs('/img', $file, $name);
        }
        
        return redirect()->back();
    }


    public function delete($file)
    {
        $file = str_replace("__", '/', $file);

        $file = Storage::delete($file);
        
        return redirect()->back();
    }
}
