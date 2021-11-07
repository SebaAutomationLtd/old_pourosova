<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DepartmentController extends Controller
{
    public function unoIndex(){
        $data['uno'] = DB::table('departments')->where('type', 'head')->where('department', 'uno')->get();
        $data['count'] = count($data['uno']);
        $data['uno'] = DB::table('departments')->where('type', 'head')->where('department', 'uno')->first();
        return view('admin.contact.uno', $data);
    }

    public function departmentStore(Request $request){

        $data = array();
        $data['name'] = $request->name;
        $data['department'] = $request->department;
        $data['type'] = $request->type;
        $data['designation'] = $request->designation;
        $data['email'] = $request->email;
        $data['contact'] = $request->contact;
        $data['phone'] = $request->phone;

        
        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'Front/photo/';
            $fileName = time(). $file->getClientOriginalName();
            $file->move($destinationPath, time(). $fileName);
            $data['image'] = $destinationPath . time() . $fileName;
        }

        DB::table('departments')->insert($data);
        $alert=array(
                     'messege'=>'Successfully, Data Inserted',
                     'alert-type'=>'success'
                    );
        return Redirect()->back()->with($alert);
    }

    public function departmentDelete($id){

        $data = DB::table('departments')->where('id',$id)->first();
        if(file_exists($data->image)){
            unlink($data->image);
        }
        DB::table('departments')->where('id',$id)->delete();
         $alert=array(
                     'messege'=>'Successfully, Data Deleted',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($alert);
    }
    public function unoEdit($id){

        $data['uno'] = DB::table('departments')->where('id', $id)->first();
        return view('admin.contact.unoEdit', $data);
    }


    public function unoUpdate(Request $request){
        $old = DB::table('departments')->where('id',$request->id)->first();

        $data = array();
        $data['name'] = $request->name;
        $data['department'] = $request->department;
        $data['type'] = $request->type;
        $data['designation'] = $request->designation;
        $data['email'] = $request->email;
        $data['contact'] = $request->contact;
        $data['phone'] = $request->phone;
        
        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'Front/photo/';
            $fileName = time(). $file->getClientOriginalName();
            $file->move($destinationPath, time(). $fileName);
            $data['image'] = $destinationPath . time() . $fileName;
            if(file_exists($old->image)){
                unlink($old->image);
            }
        }

       DB::table('departments')->where('id',$request->id)->update($data);
        $alert=array(
                     'messege'=>'Successfully, Data Updated',
                     'alert-type'=>'success'
                    );
        return Redirect()->back()->with($alert);
    }


    public function adminInfo(){
        $data['admin'] = DB::table('departments')->where('type', 'head')->where('department', 'admin')->get();
        $data['count'] = count($data['admin']);
        $data['admin'] = DB::table('departments')->where('type', 'head')->where('department', 'admin')->first();
       
        return view('admin.contact.admin', $data);
    }

    public function adminEdit($id){
         $data['uno'] = DB::table('departments')->where('id', $id)->first();
        return view('admin.contact.adminEdit', $data);
    }

    public function engineerInfo(){
        $data['engineer'] = DB::table('departments')->where('type', 'head')->where('department', 'engineer')->get();
        $data['count'] = count($data['engineer']);

        $data['engineer'] = DB::table('departments')->where('type', 'head')->where('department', 'engineer')->first();
        $data['others'] = DB::table('departments')->where('type', 'others')->where('department', 'engineer')->get();
        return view('admin.contact.engineer', $data);
    }

    public function engineerEdit($id){
         $data['engineer'] = DB::table('departments')->where('id', $id)->first();
        return view('admin.contact.engineerEdit', $data);
    }

    public function infoCenter(){
        return view('admin.contact.info');
    }
    public function infoCenterUpdate(Request $request){
        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'Front/images/';
            $fileName = 'info-center.jpg';
            $file->move($destinationPath,  $fileName);
        }
        
        $alert=array(
                     'messege'=>'Successfully, Data Updated',
                     'alert-type'=>'success'
                    );
        return Redirect()->back()->with($alert);
    }

    public function infoCenterDelete(){
        $file = 'Front/images/info-center.jpg';
        if (file_exists($file)) {
            unlink($file);
        }
        
        $alert=array(
                     'messege'=>'Successfully, Data Updated',
                     'alert-type'=>'success'
                    );
        return Redirect()->back()->with($alert);
    }

    

    
    


}
