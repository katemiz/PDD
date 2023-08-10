<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AttachmentController extends Controller
{






    public function upload(Request $request)
    {
        // Real finenames to be uploaded
        $real_fnames = json_decode($request->filesToUpload,true);

        if ($request->has('dosyalar')) {

            foreach ($request->file('dosyalar') as $dosya) {

                if ( in_array($dosya->getClientOriginalName(), $real_fnames) ) {

                    $props['user_id'] = Auth::id();
                    $props['model_name'] = $request->itemName;
                    $props['model_item_id'] = $request->itemId;
                    $props['original_file_name'] = $dosya->getClientOriginalName();
                    $props['mime_type'] = $dosya->getMimeType();
                    $props['file_size'] = $dosya->getSize();

                    $path = $props['model_name'].'/'.$props['model_item_id'];

                    $stored_file_as = Storage::disk('local')->put($path, $dosya);

                    $props['stored_file_as'] = $stored_file_as;

                    Attachment::create($props);
                }
            }

            return redirect($request->route_redirect);
        }
    }


    public function attachview()
    {
        $d = Attachment::find(request('id'));

        if (!$this->checkPermission()) {
            abort(404, 'No permission!');
        }

        $dosya = Storage::path($d->stored_file_as);

        if (file_exists($dosya)) {
            $headers = [
                'Content-Type' => $d->mime_type,
            ];

            return response()->download(
                $dosya,
                $d->original_file_name,
                $headers,
                'inline'
            );
        } else {
            abort(404, 'File not found!');
        }
    }

    public function attachdelete()
    {
        $this->checkPermission();

        switch (request('model')) {
            case 'requirement':
                $redirect = '/requirements/view/'.request('modelId');
                break;
            
        }


        Attachment::find(request('id'))->delete();

        return redirect($redirect);
    }
    



    public function checkPermission()
    {
        if ( Auth::id() ) {
            return true;
        } else {
            return false;
        }
    }








}
