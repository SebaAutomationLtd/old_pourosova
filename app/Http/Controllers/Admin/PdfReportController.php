<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;


class PdfReportController extends Controller
{
    //
    public function bosot_bari_holding_report()
    {
        $data = DB::table('general_members')
                ->leftJoin('house_types', 'general_members.type_house', '=', 'house_types.id')
                ->select('general_members.*', 'house_types.name as house_type_name')
                ->get();
                
        $pdf = PDF::loadView('admin.reports.bosot-bari-holding-report', compact('data'));

         //dd($data);
        
        $pdf->setPaper('Legal', 'landscape');
        return view('admin.reports.bosot-bari-holding-report', compact('data'));
        //return $pdf->stream('bosot-bari-holding-report.pdf');
    }
}
