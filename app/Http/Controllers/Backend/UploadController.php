<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Service\UploadWorker;
use App\Http\Requests;
use Storage;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function __construct( UploadWorker $upload )
    {
        $this->upload = $upload;
    }

    public function uploadJS(Request $request)
    {
        $files = $this->upload->upload( $request->input('file') , public_path('files'));

        if($files)
        {
            $array = [
                'success' => true,
                'files'   => $request->input('file'),
                'get'     => $request->all(),
                'post'    => $request->all()
            ];

            return response()->json($array);
        }

        return false;
    }

    public function uploadRedactor(Request $request)
    {
        $files = $this->upload->upload( $request->file('file') , 'files');

        if($files)
        {
            $array = array(
                'filelink' => asset('/files/'.$files['name']),
                'filename' => $files['name']
            );

            return response()->json($array);
        }

        return false;
    }

    public function uploadFileRedactor(Request $request)
    {
        $files = $this->upload->upload( $request->file('file') , 'files' );

        if($files)
        {
            $array = array(
                'filelink' => asset('files/'.$files['name']),
                'filename' => $files['name']
            );

            return response()->json($array);
        }

        return false;
    }

    public function imageJson()
    {
        $data  = [];
        $files = Storage::disk('files')->files();

        if(!empty($files))
        {
            foreach($files as $file)
            {
                if($file != '.DS_Store')
                {
                    $mime = \File::mimeType(public_path('files/'.$file));

                    if(substr($mime, 0, 5) == 'image')
                    {
                        $data[] = ['image' => asset('files/'.$file), 'thumb' => asset('files/'.$file), 'title' => $file];
                    }
                }
            }
        }

        return response()->json($data);
    }

    public function fileJson()
    {
        $files = Storage::disk('files')->files();
        $data  = [];
        if(!empty($files))
        {
            foreach($files as $file)
            {
                $mime = \File::mimeType(public_path('files/'.$file));

                if(substr($mime, 0, 5) != 'image')
                {
                    $data[] = ['name' => $file, 'link' => asset('files/'.$file) , 'title' => $file];
                }
            }
        }

        return response()->json($data);
    }

}
