<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:website-settings']);
    }

    public function index()
    {
        $data['notices'] = DB::table('notices')->where('type', 'notice')->orderBy('created_at', 'desc')->get();
        return view('admin.notice.notice', $data);
    }

    public function noticeStore(Request $request)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['category'] = $request->category;
        $data['status'] = $request->status;


        if ($request->has('file')) {

            $file = $request->file('file');
            $destinationPath = 'Front/files/';
            $fileName = time() . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);

            $data['file'] = $destinationPath . $fileName;
        }

        DB::table('notices')->insert($data);
        $alert = array(
            'messege' => 'Successfully, Notice Inserted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($alert);


    }

    public function noticeEdit($id)
    {
        $data['notice'] = DB::table('notices')->where('id', $id)->first();
        return view('admin.notice.noticeEdit', $data);
    }

    public function noticeUpdate(Request $request)
    {
        $old = DB::table('notices')->where('id', $request->id)->first();
        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['category'] = $request->category;
        $data['status'] = $request->status;

        if ($request->has('file')) {
            $file = $request->file('file');
            $destinationPath = 'Front/files/';
            $fileName = time() . $file->getClientOriginalName();
            $file->move($destinationPath, time() . $fileName);
            $data['file'] = $destinationPath . time() . $fileName;
            if (file_exists($old->file)) {
                unlink($old->file);
            }
        }

        DB::table('notices')->where('id', $request->id)->update($data);
        $alert = array(
            'messege' => 'Successfully, Notice Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($alert);
    }


    public function destroy($id)
    {
        $data = DB::table('notices')->where('id', $id)->first();
        if (file_exists($data->file)) {
            unlink($data->file);
        }
        DB::table('notices')->where('id', $id)->delete();
        $alert = array(
            'messege' => 'Successfully, Notice Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($alert);
    }

    public function downloadIndex()
    {
        $data['notices'] = DB::table('notices')->where('type', 'download')->orderBy('created_at', 'desc')->get();
        return view('admin.notice.download', $data);
    }

    public function downloadEdit($id)
    {
        $data['notice'] = DB::table('notices')->where('id', $id)->first();
        return view('admin.notice.downloadEdit', $data);
    }
}
