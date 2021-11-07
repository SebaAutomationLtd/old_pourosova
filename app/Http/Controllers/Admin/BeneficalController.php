<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Model\Benefecial;
class BeneficalController extends Controller
{
    public function AddBeneficial()
    {
    	return view('admin.beneficial.create');
    }

    public function StoreBeneficial(Request $request)
    {
    	$data = array();
    	$data['name'] = $request->name;
    	$data['mobile'] = $request->mobile;
    	$data['beneficial_type'] = $request->beneficial_type;
    	$data['father_name'] = $request->father_name;
    	$data['husband_name'] = $request->husband_name;
    	$data['mother_name'] = $request->mother_name;
    	$data['ward_id'] = $request->ward_id;
    	$data['nid'] = $request->nid;
    	$data['birth_certificate'] = $request->birth_certificate;
    	$data['village_id'] = $request->village_id;
    	$data['holding_no'] = $request->holding_no;
    	$data['post_office_id'] = $request->post_office_id;
        $data['post_code_id'] = $request->post_code_id;
    	DB::table('benefecials')->insert($data);

    	$notification=array(
             'messege'=>'Successfully, Beneficiaries Inserted',
             'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function AllBeneficial()
    {
    	$all = DB::table('benefecials')
    	  ->join('wards', 'benefecials.ward_id', 'wards.id')
    	  ->select('wards.ward_no', 'benefecials.*')
    	   ->orderBy('benefecials.id', 'DESC')
    	   ->get();
    	return view('admin.beneficial.index', compact('all'));
    }

    public function EditBeneficial($id)
    {
    	$edit = DB::table('benefecials')->where('id',$id)->first();

    	return view('admin.beneficial.edit', compact('edit'));
    }

    public function UpdateBeneficial(Request $request,$id)
    {
    	$data = array();
    	$data['name'] = $request->name;
    	$data['mobile'] = $request->mobile;
    	$data['beneficial_type'] = $request->beneficial_type;
    	$data['father_name'] = $request->father_name;
    	$data['husband_name'] = $request->husband_name;
    	$data['mother_name'] = $request->mother_name;
    	$data['ward_id'] = $request->ward_id;
    	$data['nid'] = $request->nid;
    	$data['birth_certificate'] = $request->birth_certificate;
    	$data['village_id'] = $request->village_id;
    	$data['holding_no'] = $request->holding_no;
    	$data['post_office_id'] = $request->post_office_id;
        $data['post_code_id'] = $request->post_code_id;
    	DB::table('benefecials')->where('id',$id)->update($data);

    	$notification=array(
             'messege'=>'Successfully, Beneficiaries Updated',
             'alert-type'=>'success'
            );
        return Redirect('/all-beneficiaries')->with($notification);
    }

    public function DeleteBeneficial($id)
    {
    	DB::table('benefecials')->where('id',$id)->delete();
    	$notification=array(
             'messege'=>'Successfully, Beneficiaries Deleted',
             'alert-type'=>'success'
            );
        return Redirect('/all-beneficiaries')->with($notification);
    }

    public function SearchBeneficial(Request $request)
    {

          if($request->nid && $request->mobile){
        $all = DB::table('benefecials')
            ->join('wards', 'benefecials.ward_id', 'wards.id')
    	  ->select('wards.ward_no', 'benefecials.*')
           ->where('benefecials.mobile', $request->mobile)
           ->where('benefecials.nid', $request->nid)
           ->orderBy('benefecials.id', 'DESC')
           ->get();
        
    }
    elseif($request->nid){
         $all = DB::table('benefecials')
          ->join('wards', 'benefecials.ward_id', 'wards.id')
    	  ->select('wards.ward_no', 'benefecials.*')
           ->where('benefecials.nid', $request->nid)
           ->orderBy('benefecials.id', 'DESC')
           ->get();
    }
    elseif($request->mobile){
        $all = DB::table('benefecials')
      ->join('wards', 'benefecials.ward_id', 'wards.id')
    	  ->select('wards.ward_no', 'benefecials.*')
           ->where('benefecials.mobile', $request->mobile)
           ->orderBy('benefecials.id', 'DESC')
           ->get();
    }
    
    elseif($request->ward_id && $request->village_id){
        $all = DB::table('benefecials')
        ->join('wards', 'benefecials.ward_id', 'wards.id')
    	  ->select('wards.ward_no', 'benefecials.*')
           ->where('benefecials.ward_id', $request->ward_id)
           ->where('benefecials.village_id', $request->village_id)
           ->orderBy('benefecials.id', 'DESC')
           ->get();
    }
    else{
      $all = Benefecial::where('ward_id', $request->ward_id)
                    ->orWhere('village_id', $request->village_id)
                    ->orWhere('mobile', $request->mobile)
                     ->orWhere('nid', $request->birth_nid)
                     ->orWhere('holding_no', $request->holding_no)
                     ->orderBy('id', 'DESC')
                    ->get();  
    }
      
       
        return view('admin.beneficial.index', compact('all')); 


    }
    
    
    public function AllAllowance()
    {
    	return view('admin.beneficial.all');
    }

    public function SelectAllowance(Request $request)
    {
    	$beneficial_type = $request->beneficial_type;
    	$all = DB::table('benefecials')
    	->join('wards', 'benefecials.ward_id', 'wards.id')
    	  ->select('wards.ward_no', 'benefecials.*')
    	  ->where('benefecials.beneficial_type', $beneficial_type)
    	   ->orderBy('benefecials.id', 'DESC')
    	   ->get();
    	return view('admin.beneficial.all_data', compact('all', 'beneficial_type'));
    }

    public function FilterAllowanceType(Request $request)
    {   
    	$beneficial_type = $request->beneficial_type;
    	 // $all = Benefecial::where('ward_id', $request->ward_id)
      //              ->orWhere('village_id', $request->village_id)
      //              ->get();

        if($request->ward_id && $request->village_id)
        {
        	$all = DB::table('benefecials')
        	    ->where('beneficial_type', $request->beneficial_type)
        	    ->where('ward_id', $request->ward_id)
        	    ->where('village_id', $request->village_id)
        	    ->get();
        }
        elseif($request->ward_id)
        {
        	$all = DB::table('benefecials')
        	    ->where('ward_id', $request->ward_id)
        	    ->where('beneficial_type', $request->beneficial_type)
        	    ->get();
        }
          
          return view('admin.beneficial.all_data', compact('all', 'beneficial_type'));
    }
}
