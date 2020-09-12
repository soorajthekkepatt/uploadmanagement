<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\File;
use App\Log;

use Session;
use DB;

class FilemanagerController extends Controller
{
    public function filemanagement()
    {
        $files  = DB::table('files')->get();
        return view ('filemanager.filemanager')->with('files', $files); 
    }
    public function uploadfiles()
    {
        # the file upload and related fields views are here
        return view ('filemanager.uploadfile'); 
    }
    public function storedata(Request $request)
    {
        # the user entering file name and files will be recived here
        $validatedData = $request->validate([
            'filename'         => 'required',
            'uploadfilename'   => 'required | max:2048',
        ]);

        $filename       = $request->filename;
        $uploadedfile = $request->file('uploadfilename');
        
        // dd($uploadfilename);

        if ($uploadedfile) {
            $uploadfilename = uniqid() . '.' . $uploadedfile->getClientOriginalExtension();
            $fileSize = $uploadedfile->getSize();
            $mimeType = $uploadedfile->getMimeType();

            // 2MB in bytes
            $maxFileSize = 2097152; 

            if($fileSize <= $maxFileSize){
                // dd($uploadfilename);
                $file = $uploadedfile->storeAs('public/files/', $uploadfilename);

                $data = new File;
                $data ->name     = $filename;
                $data ->filename = $uploadfilename;
                $data->save();


                $log = new Log;
                $log ->doneby    = Auth::user()->name;
                $log ->activity  = "inserted file : ".$filename;
                $log->save();


            }else{
                return back()->withErrors(['Successfully inserted data']);

            }
            return back()->withSuccess('Successfully uploaded files');


            }

        
    }

    public function deleterecord($id)
    {
    //    dd($id);
      $query = DB::table('files')->select('name')->where('id', '=', $id)->get();
    //   dd($query[0]->name);
       $dell = File::where('id',$id)->delete();


       $log = new Log;
        $log ->doneby    = Auth::user()->name;
        $log ->activity  = "deleted file : ".$query[0]->name;
        $log->save();

        return back()->withErrors('Successfully Deleted files');



    }

    public function activitylog()
    {
        # The Activity by the admin will shown here

        $logs  = DB::table('logs')->get();
        return view ('filemanager.activity')->with('logs', $logs); 

    }
}
