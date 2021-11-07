<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class BosotDueController extends Controller
{
    public function NewBosotBokeyaList()
    {
    	return view('bosot_due.list');
    }

    public function NewFilterBosotBokeyaList(Request $request)
    {
    	$year=date('Y');
    	if($request->ward_id && $request->village_id && $request->start_year && $request->end_year){
    		$all = DB::table('general_members')
    		    ->where('ward_id', $request->ward_id)
    		    ->where('village_id', $request->village_id)
    		    ->where('last_tax_year', '>=', $request->start_year)
    		    ->where('last_tax_year', '>=', $request->end_year)
                ->get();
           
    	}
    	
    	elseif($request->ward_id && $request->village_id){
    		$all = DB::table('general_members')
    		    ->where('ward_id', $request->ward_id)
    		    ->where('village_id', $request->village_id)
                ->get();
            
    	}

    	elseif($request->ward_id){
    		$all = DB::table('general_members')
    		    ->where('ward_id', $request->ward_id)
    		    
                ->get();
      
    	}
    	elseif($request->start_year && $request->end_year){
    		$all = DB::table('general_members')
    		   
    		    ->where('last_tax_year', '>=', $request->start_year)
    		    ->where('last_tax_year', '<=', $request->end_year)
                ->get();
            
    	}

    	elseif($request->start_year){
    		$all = DB::table('general_members')
    		   
    		    ->where('last_tax_year', '=', $request->start_year)
    		
                ->get();
         
    	}
    	elseif($request->end_year){
    		$all = DB::table('general_members')
    		   
    		  
    		    ->where('last_tax_year', '>=', $request->end_year)
                ->get();
           
    	}

    	return view('bosot_due.list_data', compact('all', 'year'));
    }

    public function AdayNewBosotDue(Request $request)
    {   
    	$get_data = DB::table('general_members')->where('id',$request->id)->first();
        $year = date('Y');
        
        $count = DB::table('pay_bosot_dues')->where('data_id',$request->id)->count();
       

        $due_cost = $year - $get_data->last_tax_year+1; 
        ?>

        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="name">নাম</label>
              <input type="text" name="owner_name" class="form-control owner_name" value="<?php echo $get_data->name; ?>" readonly="">
            </div>
          </div>
          <input type="hidden" name="data_id" value="<?php echo $get_data->id; ?>">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="user_id">ইউজার আইডি</label>
              <input type="text" name="user_id" class="form-control user_id" value="<?php echo $get_data->user_id; ?>" readonly="">
            </div>
          </div>
         
         <?php if($get_data->nid == NULL): ?>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="birth_certificate">জন্ম নিবন্ধন নম্বর</label>
              <input type="text" name="birth_certificate" class="form-control birth_certificate" value="<?php echo $get_data->birth_certificate; ?>" readonly="">
            </div>
          </div>
        <?php else: ?>
            <div class="col-sm-4">
            <div class="form-group">
              <label for="nid">এনআইডি</label>
              <input type="text" name="nid" class="form-control nid" value="<?php echo $get_data->nid; ?>" readonly="">
            </div>
          </div>
      <?php endif; ?>
        <?php if($get_data->last_tax_year == $year): ?>
        <?php else: ?>
          <?php if($count > 0): ?>
           <div class="col-sm-6">
            <h6>অর্থ বছর সমূহ</h6>
            <?php
              for($i=$get_data->last_tax_year+1; $i<=$year; $i++):


             ?>
             <input type="checkbox" class="years" name="due_years[]" id="<?php echo $i;?>" value="<?php echo $i; ?>"> 

             <label style="cursor: pointer;" for="<?php echo $i; ?>"><span class="cont"><?php echo $i; ?> -<?php echo $i+1; ?></span></label><br>
         <?php endfor; ?>
          </div>
          <?php else: ?>
          <div class="col-sm-6">
            <h6>অর্থ বছর সমূহ</h6>
            <?php
              for($i=$get_data->last_tax_year; $i<=$year; $i++):


             ?>
             <input type="checkbox" class="years" name="due_years[]" id="<?php echo $i;?>" value="<?php echo $i; ?>"> 

             <label style="cursor: pointer;" for="<?php echo $i; ?>"><span class="cont"><?php echo $i; ?> -<?php echo $i+1; ?></span></label><br>
         <?php endfor; ?>
          </div>
      <?php endif; ?>
         <?php endif; ?>

         <div class="col-sm-6">
            <div class="form-group">
                <label for="due_amount">মোট বকেয়া ( টাকা )</label>
                <?php if($count > 0): ?>
                    <?php  $info = DB::table('pay_bosot_dues')->where('data_id', $request->id)->first(); ?>
                    <input type="text" name="total_due_amount" id="total_due_amount" class="form-control" value="<?php echo $info->remain_due; ?>" readonly="">
                <?php else: ?>
                    <input type="text" name="total_due_amount" id="total_due_amount" class="form-control" value="<?php echo $due_cost * $get_data->yearly_vat; ?>" readonly="">
                <?php endif; ?>
             </div> 
         </div>
        
         <div class="col-sm-6">
            <div class="form-group">
              <label for="paid_amount">পরিশোধ</label>
              <input type="text" name="paid_amount" id="paid_amount" class="form-control" placeholder="পরিশোধ">
            </div>
         </div>

         <div class="col-sm-6">
            <div class="form-group">
                <label for="last_due">অবশিষ্ট বকেয়া</label>
                  <input type="text" id="last_due" name="last_due" class="form-control" placeholder="অবশিষ্ট বকেয়া" readonly="">
            </div>
         </div>
        </div>
         
        <?php
    }

    public function InsertNewBosotDue(Request $request)
    {
    	$year = date('Y'); 
        $get_data = DB::table('general_members')->where('id',$request->data_id)->first();

        $count = DB::table('pay_bosot_dues')->where('data_id',$request->data_id)->where('user_id',$request->user_id)->count();  
        $data_first = DB::table('pay_bosot_dues')->where('data_id',$request->data_id)->where('user_id',$request->user_id)->first();  
        $due_years = $request->due_years;
       
        $update_last_tax_year = $request->update_last_tax_year;
        if($due_years)
        {
            $largest_year = max($due_years);
        }
        
        
   
       if($count > 0)
       {   
           if($request->due_years)
           {
               DB::table('pay_bosot_dues')
              ->where('id',$data_first->id)
              ->update([
                 'pay_sum' => $request->paid_amount,
                 'payment_years'=>$largest_year,
                 'remain_due' => $request->last_due,
                 'total_due' => $request->total_due_amount,
                 'date' => date('Y-m-d'),
                 'year' => date('Y'),
              ]);
           }
           else
           {
              DB::table('pay_bosot_dues')
              ->where('id',$data_first->id)
              ->update([
                 'pay_sum' => $request->paid_amount,
                 'payment_years'=>$data_first->payment_years,
                 'remain_due' => $request->last_due,
                 'total_due' => $request->total_due_amount,
                 'date' => date('Y-m-d'),
                 'year' => date('Y'),
                 'month' => date('F'),
              ]);
           }
          

            if($request->due_years)
            {
                 DB::table('general_members')

             ->where('user_id', $request->user_id)
              ->update(['last_tax_year'  => $largest_year]);
            }
          
           $notification=array(
             'messege'=>'Successfully, Payment Paid',
             'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
       }

       else{
         $data = array();
         $data['user_id'] = $request->user_id;
         $data['data_id'] = $request->data_id;
         $data['date'] =  date('Y-m-d');
         $data['month'] = date('F');
         $data['year'] = date('Y');
         $data['pay_sum'] = $request->paid_amount;
         $data['remain_due'] = $request->last_due;
         $data['payment_years'] = $largest_year;
         $data['total_due'] = $request->total_due_amount;
         DB::table('pay_bosot_dues')->insert($data);
        DB::table('general_members')

             ->where('user_id', $request->user_id)
              ->update(['last_tax_year'  => $largest_year]);
        
        $notification=array(
             'messege'=>'Successfully, Payment Paid',
             'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
       }
    }

    public function NewTotalBosotDue()
    {
    	$all = DB::table('general_members')->orderBy('id', 'DESC')->get();
    	return view('bosot_due.index', compact('all')); 
    }

    public function NewBosotDueAdayList()
    {  
    	$year = date('Y');
     	$all = DB::table('pay_bosot_dues')
    	   ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    	   ->select('general_members.*', 'pay_bosot_dues.*')
    	   ->orderBy('pay_bosot_dues.id', 'DESC')
    	   ->get(); 
       return view('bosot_due.aday_list', compact('all', 'year'));
    }

    public function NewBosotDueAdayListTwo(Request $request)
    {
    	$year = date('Y');
    	if($request->ward_id && $request->village_id && $request->start_year && $request->end_year && $request->start_date && $request->end_date){
    		$all = DB::table('pay_bosot_dues')
    		   ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		   ->select('general_members.*', 'pay_bosot_dues.*')
    		   ->where('general_members.ward_id', $request->ward_id)
    		   ->where('general_members.village_id', $request->village_id)
    		   ->where('general_members.start_year', '>=', $request->start_year)
    		    ->where('general_members.end_year', '<=', $request->end_year)
    		   ->get();

    		   return view('bosot_due.aday_list', compact('all', 'year'));
    	}
    	elseif($request->ward_id && $request->village_id){
    		$all = DB::table('pay_bosot_dues')
    		   ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		   ->select('general_members.*', 'pay_bosot_dues.*')
    		   ->where('general_members.ward_id', $request->ward_id)
    		   ->where('general_members.village_id', $request->village_id)
    		   ->get();
    	   return view('bosot_due.aday_list', compact('all', 'year'));
    	}
    	elseif($request->ward_id){
    		$all = DB::table('pay_bosot_dues')

    		->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		   ->select('general_members.*', 'pay_bosot_dues.*')
    		   ->where('general_members.ward_id', $request->ward_id)
    		   
    		   ->get();
    	   return view('bosot_due.aday_list', compact('all', 'year'));
    	}

    	elseif($request->start_year && $request->end_year){
    		
    		$all = DB::table('pay_bosot_dues')

    		->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		   ->select('general_members.*', 'pay_bosot_dues.*')
    		   ->where('general_members.last_tax_year', '>=',  $request->start_year)

    		   ->where('general_members.last_tax_year', '<=',  $request->end_year)
    		   
    		   ->get(); 

    	 return view('bosot_due.aday_list', compact('all', 'year'));
            
    	}

    	elseif($request->start_year){ 
    		$all = DB::table('pay_bosot_dues')

    		->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		   ->select('general_members.*', 'pay_bosot_dues.*')
    		   ->where('general_members.last_tax_year', '=',  $request->start_year)

    		   
    		   
    		   ->get(); 

    	 return view('bosot_due.aday_list', compact('all', 'year'));
         
    	}
    	elseif($request->end_year){
    		$all = DB::table('pay_bosot_dues')

    		->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		   ->select('general_members.*', 'pay_bosot_dues.*')
    		   ->where('general_members.last_tax_year', '<=',  $request->end_year)

    		   
    		   
    		   ->get(); 

    	 return view('bosot_due.aday_list', compact('all', 'year'));
           
    	}

    	elseif($request->start_date && $request->end_date){
    		$all = DB::table('pay_bosot_dues')
    		    ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		    ->select('general_members.*', 'pay_bosot_dues.*')
    		    ->where('pay_bosot_dues.date', '>=', $request->start_date)
    		    ->where('pay_bosot_dues.date', '<=', $request->end_date)
    		    ->get();
    		    return view('bosot_due.aday_list', compact('all', 'year'));
    	}
    	elseif($request->start_date){
    		$all = DB::table('pay_bosot_dues')
    		    ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		    ->select('general_members.*', 'pay_bosot_dues.*')
    		    ->where('pay_bosot_dues.date', '=', $request->start_date)
    		   
    		    ->get();
    		    return view('bosot_due.aday_list', compact('all', 'year'));
    	}
    	elseif($request->end_date){
    		$all = DB::table('pay_bosot_dues')
    		    ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		    ->select('general_members.*', 'pay_bosot_dues.*')
    		    
    		    ->where('pay_bosot_dues.date', '<=', $request->end_date)
    		    ->get();
    		    return view('bosot_due.aday_list', compact('all', 'year'));
    	}
    }
}
