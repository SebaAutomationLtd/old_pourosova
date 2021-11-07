<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function notice(){
        return view('Admin.Notice.notice');
    }
    public function download(){
        return view('Admin.Notice.download');
    }
    
    
    
    public function ImportantNotice()
    {   
        $all = DB::table('important_links')->orderBy('id', 'DESC')->get();
    	return view('admin.Notice.all_important_link', compact('all'));
    }

    public function InsertLink(Request $request)
    {   
        $data = array();
        $data['title'] = $request->title;
        $data['url'] = $request->url;
        $data['left_sidebar'] = $request->left_sidebar;
        $data['right_sidebar'] = $request->right_sidebar;
        $data['description'] = $request->description;
        $image = $request->file('image');

        if($image){
            $imageName = time().'.'.$request->image->extension();  
   
          $request->image->move(public_path('upload/Notice'), $imageName);
           $data['image'] = 'upload/Notice/'.$imageName;
        }

        DB::table('important_links')->insert($data);

        $notification=array(
             'messege'=>'Successfully, Date Inserted',
             'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function AddLink()
    {
        return view('admin.Notice.add_link');
    }

    public function EditLink($id)
    {
        $edit = DB::table('important_links')->where('id',$id)->first();
        return view('admin.Notice.edit_link', compact('edit'));
    }

    public function UpdateLink(Request $request, $id)
    {
        $get_data = DB::table('important_links')->where('id',$id)->first();

         $data = array();
        $data['title'] = $request->title;
        $data['url'] = $request->url;
        $data['left_sidebar'] = $request->left_sidebar;
        $data['right_sidebar'] = $request->right_sidebar;
        $data['description'] = $request->description;
        $image = $request->file('image');

        if($image){
            $imageName = time().'.'.$request->image->extension();  
   
          $request->image->move(public_path('upload/Notice'), $imageName);
           $data['image'] = 'upload/Notice/'.$imageName;
        }else{
            $data['image'] = $get_data->image;
        }

        DB::table('important_links')->where('id',$id)->update($data);

        $notification=array(
             'messege'=>'Successfully, Date Updated',
             'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function DeleteLink($id)
    {
        DB::table('important_links')->where('id',$id)->delete();
        $notification=array(
             'messege'=>'Successfully, Date Deleted',
             'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    
    public function WelcomeDescription()
    {
        $edit = DB::table('welcome_descriptions')->where('id',1)->first();
        return view('welcome_description', compact('edit'));
    }

    public function UpdateWelcomeDescription(Request $request, $id)
    {
        $data = array();
        $data['description'] = $request->description;
        DB::table('welcome_descriptions')->where('id',$id)->update($data);
         $notification=array(
             'messege'=>'Successfully, Date Updated',
             'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
