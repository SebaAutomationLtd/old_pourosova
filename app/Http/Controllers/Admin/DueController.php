<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class DueController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:trade-license-due|bosot-bari-due']);
    }

    public function BosotDuelist()
    {
        $year = date('Y');
        return view('admin.due.filter', compact('year'));
    }

    public function GetWardVillageData(Request $request)
    {
        $villages = DB::table('villages')->where('ward_id', $request->id)->orderBy('id', 'DESC')->get();

        ?>
        <select name="village_id" id="village_id" class="form-control">
            <option value="" selected disabled="">গ্রাম</option>
            <?php foreach ($villages as $row): ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->village_name; ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }

    public function SearchBosotDue(Request $request)
    {
        $year = date('Y');
        if ($request->ward_id && $request->village_id && $request->start_year && $request->end_year) {
            $all = DB::table('general_members')
                ->where('ward_id', $request->ward_id)
                ->where('village_id', $request->village_id)
                ->where('last_tax_year', '>=', $request->start_year)
                ->where('last_tax_year', '>=', $request->end_year)
                ->get();

        } elseif ($request->ward_id && $request->village_id) {
            $all = DB::table('general_members')
                ->where('ward_id', $request->ward_id)
                ->where('village_id', $request->village_id)
                ->get();

        } elseif ($request->ward_id) {
            $all = DB::table('general_members')
                ->where('ward_id', $request->ward_id)
                ->get();

        } elseif ($request->start_year && $request->end_year) {
            $all = DB::table('general_members')
                ->where('last_tax_year', '>=', $request->start_year)
                ->where('last_tax_year', '<=', $request->end_year)
                ->get();

        } elseif ($request->start_year) {
            $all = DB::table('general_members')
                ->where('last_tax_year', '=', $request->start_year)
                ->get();

        } elseif ($request->end_year) {
            $all = DB::table('general_members')
                ->where('last_tax_year', '>=', $request->end_year)
                ->get();

        }

        return view('due_data', compact('all', 'year'));
    }

    public function TotalBosotDue()
    {
        $year = date('Y');
        $all = DB::table('general_members')->where('last_tax_year', '<', $year)->get();
        return view('admin.due.total', compact('all', 'year'));
    }

    public function PayBosotDue()
    {
        $year = date('Y');
        $all = DB::table('pay_bosot_taxes')
            ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
            ->select('general_members.*', 'pay_bosot_taxes.*')
            ->orderBy('pay_bosot_taxes.id', 'DESC')
            ->get();
        return view('admin.due.pay', compact('year', 'all'));
    }

    public function FilterPayBosotBari(Request $request)
    {
        $year = date('Y');
        if ($request->ward_id && $request->village_id && $request->start_year && $request->end_year && $request->start_date && $request->end_date) {
            echo "sob ase";
        } elseif ($request->ward_id && $request->village_id) {
            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('general_members.ward_id', $request->ward_id)
                ->where('general_members.village_id', $request->village_id)
                ->get();
            return view('admin.due.pay', compact('all', 'year'));
        } elseif ($request->ward_id) {
            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('general_members.ward_id', $request->ward_id)
                ->get();
            return view('admin.due.pay', compact('all', 'year'));
        } elseif ($request->start_year && $request->end_year) {

            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('general_members.last_tax_year', '>=', $request->start_year)
                ->where('general_members.last_tax_year', '<=', $request->end_year)
                ->get();

            return view('admin.due.pay', compact('all', 'year'));

        } elseif ($request->start_year) {
            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('general_members.last_tax_year', '=', $request->start_year)
                ->get();

            return view('admin.due.pay', compact('all', 'year'));

        } elseif ($request->end_year) {
            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('general_members.last_tax_year', '<=', $request->end_year)
                ->get();

            return view('admin.due.pay', compact('all', 'year'));

        } elseif ($request->start_date && $request->end_date) {
            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('pay_bosot_taxes.date', '>=', $request->start_date)
                ->where('pay_bosot_taxes.date', '<=', $request->end_date)
                ->get();
            return view('admin.due.pay', compact('all', 'year'));
        } elseif ($request->start_date) {
            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('pay_bosot_taxes.date', '=', $request->start_date)
                ->get();
            return view('admin.due.pay', compact('all', 'year'));
        } elseif ($request->end_date) {
            $all = DB::table('pay_bosot_taxes')
                ->join('general_members', 'pay_bosot_taxes.user_id', 'general_members.user_id')
                ->select('general_members.*', 'pay_bosot_taxes.*')
                ->where('pay_bosot_taxes.date', '<=', $request->end_date)
                ->get();
            return view('admin.due.pay', compact('all', 'year'));
        }
    }

    public function DueAday($id)
    {
        $year = date('Y');
        $data = DB::table('general_members')->where('id', $id)->first();
        return view('admin.due.aday', compact('data', 'year'));
    }

    public function PaidBosotDue(Request $request, $id)
    {

        $get_data = DB::table('general_members')->where('id', $id)->first();
        $count = DB::table('pay_bosot_taxes')->where('user_id', $get_data->user_id)->count();
        if ($count > 0) {
            DB::table('pay_bosot_taxes')
                ->where('user_id', $get_data->user_id)
                ->where('data_id', $id)
                ->update([
                    'pay_sum' => $request->paid_amount,
                    'remain_due' => $request->last_due,
                    'date' => date('Y-m-d'),
                    'month' => date('F'),
                    'year' => date('Y'),
                ]);

            $notification = array(
                'messege' => 'Successfully, Payment Paid',
                'alert-type' => 'success'
            );
            return redirect('/pay-bosot_due')->with($notification);
        } else {
            $due_years = $request->due_years;
            $replace = implode(',', $due_years);
            $update_last_tax_year = $request->update_last_tax_year;
            $largest_year = max($due_years);

            $data = array();
            $data['user_id'] = $get_data->user_id;
            $data['data_id'] = $get_data->id;
            $data['pay_sum'] = $request->paid_amount;
            $data['payment_years'] = $replace;
            $data['total_due'] = $request->total_due_amount;
            $data['remain_due'] = $request->last_due;
            $data['date'] = date('Y-m-d');
            $data['month'] = date('F');
            $data['year'] = date('Y');

            DB::table('pay_bosot_taxes')->insert($data);

            DB::table('general_members')
                ->where('id', $id)
                ->update(['last_tax_year' => $largest_year]);

            $notification = array(
                'messege' => 'Successfully, Payment Paid',
                'alert-type' => 'success'
            );
            return redirect('/pay-bosot_due')->with($notification);
        }

    }

    public function DueDataAday($id)
    {

        $year = date('Y');
        $data = DB::table('general_members')->where('id', $id)->first();
        return view('admin.due.due_collection', compact('data', 'year'));
    }

    public function CollectionDue(Request $request, $id)
    {
        $get_data = DB::table('general_members')->where('id', $id)->first();
        $count = DB::table('pay_bosot_taxes')->where('user_id', $get_data->user_id)->count();
        if ($count > 0) {
            DB::table('pay_bosot_taxes')
                ->where('user_id', $get_data->user_id)
                ->where('data_id', $id)
                ->update([
                    'pay_sum' => $request->paid_amount,
                    'remain_due' => $request->last_due,
                    'date' => date('Y-m-d'),
                    'month' => date('F'),
                    'year' => date('Y'),
                ]);

            $notification = array(
                'messege' => 'Successfully, Payment Paid',
                'alert-type' => 'success'
            );
            return redirect('/bosot-due_list')->with($notification);
        } else {
            $due_years = $request->due_years;
            $replace = implode(',', $due_years);
            $update_last_tax_year = $request->update_last_tax_year;
            $largest_year = max($due_years);

            $data = array();
            $data['user_id'] = $get_data->user_id;
            $data['data_id'] = $get_data->id;
            $data['pay_sum'] = $request->paid_amount;
            $data['payment_years'] = $replace;
            $data['total_due'] = $request->total_due_amount;
            $data['remain_due'] = $request->last_due;
            $data['date'] = date('Y-m-d');
            $data['month'] = date('F');
            $data['year'] = date('Y');

            DB::table('pay_bosot_taxes')->insert($data);

            DB::table('general_members')
                ->where('id', $id)
                ->update(['last_tax_year' => $largest_year]);

            $notification = array(
                'messege' => 'Successfully, Payment Paid',
                'alert-type' => 'success'
            );
            return redirect('/bosot-due_list')->with($notification);
        }
    }


    public function TradeDue()
    {
        $year = date('Y');
        return view('admin.due.trade_due', compact('year'));
    }

    public function FilterTradeDue(Request $request)
    {
        $year = date('Y');
        if ($request->ward_id && $request->village_id && $request->end_year) {
            $all = DB::table('business_holds')
                ->where('ward_id', $request->ward_id)
                ->where('village_id', $request->village_id)
                ->where('end_year', '<=', $request->end_year)
                ->get();
        } elseif ($request->ward_id && $request->village_id) {
            $all = DB::table('business_holds')
                ->where('ward_id', $request->ward_id)
                ->where('village_id', $request->village_id)
                ->get();
        } elseif ($request->ward_id && $request->end_year) {
            $all = DB::table('business_holds')
                ->where('ward_id', $request->ward_id)
                ->where('end_year', '<=', $request->end_year)
                ->get();
        } elseif ($request->ward_id) {
            $all = DB::table('business_holds')
                ->where('ward_id', $request->ward_id)
                ->get();
        }


        return view('admin.due.trade_filter_due', compact('all', 'year'));
    }

    public function AdayTradeDue(Request $request)
    {
        $get_data = DB::table('business_holds')->where('id', $request->id)->first();
        $year = date('Y');

        $count = DB::table('due_trade_licenses')->where('data_id', $request->id)->count();


        $due_cost = $year - $get_data->last_license_issue_year + 1;
        ?>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="name">নাম</label>
                    <input type="text" name="owner_name" class="form-control owner_name"
                           value="<?php echo $get_data->owner_name; ?>" readonly="">
                </div>
            </div>
            <input type="hidden" name="data_id" value="<?php echo $get_data->id; ?>">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="user_id">ইউজার আইডি</label>
                    <input type="text" name="user_id" class="form-control user_id"
                           value="<?php echo $get_data->user_id; ?>" readonly="">
                </div>
            </div>

            <?php if ($get_data->nid == NULL): ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="birth_certificate">জন্ম নিবন্ধন নম্বর</label>
                        <input type="text" name="birth_certificate" class="form-control birth_certificate"
                               value="<?php echo $get_data->birth_certificate; ?>" readonly="">
                    </div>
                </div>
            <?php else: ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nid">এনআইডি</label>
                        <input type="text" name="nid" class="form-control nid" value="<?php echo $get_data->nid; ?>"
                               readonly="">
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($get_data->last_license_issue_year == $year): ?>
            <?php else: ?>
                <?php if ($count > 0): ?>
                    <div class="col-sm-6">
                        <h6>অর্থ বছর সমূহ</h6>
                        <?php
                        for ($i = $get_data->last_license_issue_year + 1; $i <= $year; $i++):


                            ?>
                            <input type="checkbox" class="years" name="due_years[]" id="<?php echo $i; ?>"
                                   value="<?php echo $i; ?>">

                            <label style="cursor: pointer;" for="<?php echo $i; ?>"><span class="cont"><?php echo $i; ?> -<?php echo $i + 1; ?></span></label>
                            <br>
                        <?php endfor; ?>
                    </div>
                <?php else: ?>
                    <div class="col-sm-6">
                        <h6>অর্থ বছর সমূহ</h6>
                        <?php
                        for ($i = $get_data->last_license_issue_year; $i <= $year; $i++):


                            ?>
                            <input type="checkbox" class="years" name="due_years[]" id="<?php echo $i; ?>"
                                   value="<?php echo $i; ?>">

                            <label style="cursor: pointer;" for="<?php echo $i; ?>"><span class="cont"><?php echo $i; ?> -<?php echo $i + 1; ?></span></label>
                            <br>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="due_amount">মোট বকেয়া ( টাকা )</label>
                    <?php if ($count > 0): ?>
                        <?php $info = DB::table('due_trade_licenses')->where('data_id', $request->id)->first(); ?>
                        <input type="text" name="total_due_amount" id="total_due_amount" class="form-control"
                               value="<?php echo $info->remain_due; ?>" readonly="">
                    <?php else: ?>
                        <input type="text" name="total_due_amount" id="total_due_amount" class="form-control"
                               value="<?php echo $due_cost * $get_data->trade_total; ?>" readonly="">
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
                    <input type="text" id="last_due" name="last_due" class="form-control" placeholder="অবশিষ্ট বকেয়া"
                           readonly="">
                </div>
            </div>
        </div>

        <?php
    }

    public function InsertTradeDue(Request $request)
    {
        $year = date('Y');
        $get_data = DB::table('business_holds')->where('id', $request->data_id)->first();

        $count = DB::table('due_trade_licenses')->where('data_id', $request->data_id)->where('user_id', $request->user_id)->count();
        $data_first = DB::table('due_trade_licenses')->where('data_id', $request->data_id)->where('user_id', $request->user_id)->first();
        $due_years = $request->due_years;

        $update_last_tax_year = $request->update_last_tax_year;
        if ($due_years) {
            $largest_year = max($due_years);
        }


        if ($count > 0) {
            if ($request->due_years) {
                DB::table('due_trade_licenses')
                    ->where('id', $data_first->id)
                    ->update([
                        'pay_sum' => $request->paid_amount,
                        'payment_years' => $largest_year,
                        'remain_due' => $request->last_due,
                        'total_due' => $request->total_due_amount,
                        'date' => date('Y-m-d'),
                        'year' => date('Y'),
                    ]);
            } else {
                DB::table('due_trade_licenses')
                    ->where('id', $data_first->id)
                    ->update([
                        'pay_sum' => $request->paid_amount,
                        'payment_years' => $data_first->payment_years,
                        'remain_due' => $request->last_due,
                        'total_due' => $request->total_due_amount,
                        'date' => date('Y-m-d'),
                        'year' => date('Y'),
                    ]);
            }


            if ($request->due_years) {
                DB::table('business_holds')
                    ->where('user_id', $request->user_id)
                    ->update(['last_license_issue_year' => $largest_year]);
            }

            $notification = array(
                'messege' => 'Successfully, Payment Paid',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $data = array();
            $data['user_id'] = $request->user_id;
            $data['data_id'] = $request->data_id;
            $data['date'] = date('Y-m-d');

            $data['year'] = date('Y');
            $data['pay_sum'] = $request->paid_amount;
            $data['remain_due'] = $request->last_due;
            $data['payment_years'] = $largest_year;
            $data['total_due'] = $request->total_due_amount;
            DB::table('due_trade_licenses')->insert($data);
            DB::table('business_holds')
                ->where('user_id', $request->user_id)
                ->update(['last_license_issue_year' => $largest_year]);

            $notification = array(
                'messege' => 'Successfully, Payment Paid',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }
}
