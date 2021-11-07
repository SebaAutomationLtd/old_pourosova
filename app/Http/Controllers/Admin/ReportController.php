<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function AllReport()
    {
    	return view('report.all');
    }

    public function SelectOption(Request $request)
    {
    	$option_type = $request->option_type;
    	if($option_type == '1')
    	{
    		$all = DB::table('pay_bosot_dues')
    		     ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		    

    		     ->select('general_members.*','pay_bosot_dues.*')
    		     ->get();

    		return view('report.bosot_report', compact('all'));

    	}
    	elseif($option_type == '2')
    	{
    		$all = DB::table('due_trade_licenses')
    		  ->join('business_holds', 'due_trade_licenses.user_id', 'business_holds.user_id')
    		     ->select('business_holds.*','due_trade_licenses.*')
    		     ->get();
    	
    		return view('report.trade_report', compact('all'));
    	}
    	elseif($option_type == '3')
    	{ 
    		$all = DB::table('sanad_applies')
    		    ->join('general_members', 'sanad_applies.user_id', 'general_members.user_id')
    		    ->join('wards', 'general_members.ward_id', 'wards.id')
    		     ->join('villages', 'general_members.village_id', 'villages.id')
    		     ->select('general_members.*','sanad_applies.*', 'wards.ward_no', 'villages.village_name')
    		     ->get();
    		 return view('report.nagorik_sonod', compact('all'));
    	}
    	elseif($option_type == '4')
    	{
    		$all = DB::table('charater_certificates')
    		   
    		     ->get();
    		 return view('report.character_sonod', compact('all'));
    	}
    	elseif($option_type == '5')
    	{
    		$all = DB::table('orphan_certficates')
    		   
    		     ->get();
    		 return view('report.orphan_sonod', compact('all'));
    	}
    	elseif($option_type == '6')
    	{
    		$all = DB::table('death_certficated')
    		   
    		     ->get();
    		 return view('report.death_sonod', compact('all'));
    	}
    	else
    	{
    		$all = DB::table('warish_certificates')
    		   
    		     ->get();
    		 return view('report.warish_sonod', compact('all'));
    	}
    }

    public function FilterDataBosotReport(Request $request)
    {   
    	if($request->report == 'today')
    	{
    		$today = date('Y-m-d');
    	   $all = DB::table('pay_bosot_dues')
    		     ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		     ->select('general_members.*','pay_bosot_dues.*')
    		     ->where('pay_bosot_dues.date', $today)
    		     ->get();
    		return view('report.bosot_report', compact('all'));
    	}
    	elseif($request->report == 'current_month')
    	{   
    		$month = date('F');
    		$all = DB::table('pay_bosot_dues')
    		     ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		     ->select('general_members.*','pay_bosot_dues.*')
    		     ->where('pay_bosot_dues.month', $month)
    		     ->get();
    		return view('report.bosot_report', compact('all'));
    	}

    	else
    	{    
    		$week_date = date('Y-m-d', strtotime('-7 days'));
    		$date = date('Y-m-d');
    		
    		$all = DB::table('pay_bosot_dues')
    		     ->join('general_members', 'pay_bosot_dues.user_id', 'general_members.user_id')
    		     ->select('general_members.*','pay_bosot_dues.*')
    		     ->where('pay_bosot_dues.date', '>=', $week_date)
    		     ->where('pay_bosot_dues.date', '<=', $date)
    		     ->get();
    		return view('report.bosot_report', compact('all'));
    	}
    	
    }

    public function FilterDataTradeReport(Request $request)
    {
    	if($request->report == 'today')
    	{
    		$today = date('Y-m-d');
    	   $all = DB::table('due_trade_licenses')
    		     ->join('business_holds', 'due_trade_licenses.user_id', 'business_holds.user_id')
    		     ->select('business_holds.*','due_trade_licenses.*')
    		     ->where('due_trade_licenses.date', $today)
    		     ->get();
    		return view('report.trade_report', compact('all'));
    	}
    	elseif($request->report == 'current_month')
    	{   
    		$month = date('F');
    		$all = DB::table('due_trade_licenses')
    		     ->join('business_holds', 'due_trade_licenses.user_id', 'business_holds.user_id')
    		     ->select('business_holds.*','due_trade_licenses.*')
    		     ->where('due_trade_licenses.month', $month)
    		     ->get();
    		return view('report.trade_report', compact('all'));
    	}

    	else
    	{
    		$week_date = date('Y-m-d', strtotime('-7 days'));
    		$date = date('Y-m-d');
    		$all = DB::table('due_trade_licenses')
    		     ->join('business_holds', 'due_trade_licenses.user_id', 'business_holds.user_id')
    		     ->select('business_holds.*','due_trade_licenses.*')
    		     ->where('due_trade_licenses.date', '>=', $week_date)
    		     ->where('due_trade_licenses.date', '<=', $date)
    		     ->get();
    		return view('report.trade_report', compact('all'));
    	}
    }

    public function FilterDataNagorikReport(Request $request)
    {   
    	if($request->report == 'today')
    	{
    		$today = date('Y-m-d');
    	    $all = DB::table('sanad_applies')
    	        ->join('general_members', 'sanad_applies.user_id', 'general_members.user_id')
    		     ->select('general_members.*','sanad_applies.*')
    		     ->where('sanad_applies.date', $today)
    		     ->get();
    		return view('report.nagorik_sonod', compact('all'));
    	}

    	elseif($request->report == 'last_week')
    	{
    		$week_date = date('Y-m-d', strtotime('-7 days'));
    		$date = date('Y-m-d');
    	    $all = DB::table('sanad_applies')
    	        ->join('general_members', 'sanad_applies.user_id', 'general_members.user_id')
    		     ->select('general_members.*','sanad_applies.*')
    		     ->where('sanad_applies.date', '>=', $week_date)
    		     ->where('sanad_applies.date', '<=', $date)
    		     ->get();

    		return view('report.nagorik_sonod', compact('all'));
    	}
    	
    }

    public function FilterDataCharacterReport(Request $request)
    {
    	if($request->report == 'today')
    	{
    		$today = date('Y-m-d');
    	    $all = DB::table('charater_certificates')
    	        
    		     ->where('charater_certificates.date', $today)
    		     ->get();
    		return view('report.character_sonod', compact('all'));
    	}

    	elseif($request->report == 'last_week')
    	{
    		$week_date = date('Y-m-d', strtotime('-7 days'));
    		$date = date('Y-m-d');
    	    $all = DB::table('charater_certificates')
    	        
    		     ->where('charater_certificates.date', '>=', $week_date)
    		     ->where('charater_certificates.date', '<=', $date)
    		     ->get();

    		return view('report.character_sonod', compact('all'));
    	}
    }

    public function FilterDataOrphanReport(Request $request)
    {
    	if($request->report == 'today')
    	{
    		$today = date('Y-m-d');
    	    $all = DB::table('orphan_certficates')
    	        
    		     ->where('orphan_certficates.date', $today)
    		     ->get();
    		return view('report.character_sonod', compact('all'));
    	}

    	elseif($request->report == 'last_week')
    	{
    		$week_date = date('Y-m-d', strtotime('-7 days'));
    		$date = date('Y-m-d');
    	    $all = DB::table('orphan_certficates')
    	        
    		     ->where('orphan_certficates.date', '>=', $week_date)
    		     ->where('orphan_certficates.date', '<=', $date)
    		     ->get();

    		return view('report.character_sonod', compact('all'));
    	}
    }

    public function FilterDataDeathReport(Request $request)
    {
    	if($request->report == 'today')
    	{
    		$today = date('Y-m-d');
    	    $all = DB::table('death_certficated')
    	        
    		     ->where('death_certficated.date', $today)
    		     ->get();
    		return view('report.death_sonod', compact('all'));
    	}

    	elseif($request->report == 'last_week')
    	{
    		$week_date = date('Y-m-d', strtotime('-7 days'));
    		$date = date('Y-m-d');
    	    $all = DB::table('death_certficated')
    	        
    		     ->where('death_certficated.date', '>=', $week_date)
    		     ->where('death_certficated.date', '<=', $date)
    		     ->get();

    		return view('report.death_sonod', compact('all'));
    	}
    }

    public function FilterDataWarishReport(Request $request)
    {
    	if($request->report == 'today')
    	{
    		$today = date('Y-m-d');
    	    $all = DB::table('warish_certificates')
    	        
    		     ->where('warish_certificates.date', $today)
    		     ->get();
    		return view('report.death_sonod', compact('all'));
    	}

    	elseif($request->report == 'last_week')
    	{
    		$week_date = date('Y-m-d', strtotime('-7 days'));
    		$date = date('Y-m-d');
    	    $all = DB::table('warish_certificates')
    	        
    		     ->where('warish_certificates.date', '>=', $week_date)
    		     ->where('warish_certificates.date', '<=', $date)
    		     ->get();

    		return view('report.warish_sonod', compact('all'));
    	}
    }
}
