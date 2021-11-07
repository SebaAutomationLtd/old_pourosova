<?php

namespace App\Http\Controllers;

use DB;

class CertificateListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:certificate-list']);
    }

    public function AllNagorikSonod()
    {
        $all = DB::table('sanad_applies')->orderBy('id', 'DESC')->get();
        return view('admin.list.all_nagorik', compact('all'));
    }

    public function AllCharacterSonod()
    {
        $all = DB::table('charater_certificates')->orderBy('id', 'DESC')->get();
        return view('admin.list.all_character_certificate', compact('all'));
    }

    public function ViewCharacterCertificate($id)
    {
        $view = DB::table('charater_certificates')->where('id', $id)->first();
        return view('admin.list.view', compact('view'));
    }

    public function ApprovedCharacterCertificate($id)
    {
        $date = date('Y-m-d');
        DB::table('charater_certificates')
            ->where('id', $id)
            ->update(['status' => 1,
                'date' => $date
            ]);
        $notification = array(
            'messege' => 'Successfully, This Character Sonod Has been Approved',
            'alert-type' => 'success'
        );
        return redirect('/all-character_sonod')->with($notification);
    }

    public function InactivedCharacterCertificate($id)
    {
        DB::table('charater_certificates')
            ->where('id', $id)
            ->update(['status' => 0]);
        $notification = array(
            'messege' => 'Successfully, This Character Sonod Has been Inactived',
            'alert-type' => 'success'
        );
        return redirect('/all-character_sonod')->with($notification);
    }

    public function ApprovedNagorik($id)
    {
        $date = date('Y-m-d');
        DB::table('sanad_applies')
            ->where('id', $id)
            ->update(['status' => 1,
                'date' => $date
            ]);
        $notification = array(
            'messege' => 'Successfully, This Nagorik Sonod Has been Approved',
            'alert-type' => 'success'
        );
        return redirect('/all-nagorik_sonod')->with($notification);
    }

    public function InactiveNagorik($id)
    {
        DB::table('sanad_applies')
            ->where('id', $id)
            ->update(['status' => 0,
                'date' => $date
            ]);
        $notification = array(
            'messege' => 'Successfully, This Nagorik Sonod Has been Inactived',
            'alert-type' => 'success'
        );
        return redirect('/all-nagorik_sonod')->with($notification);
    }

    public function ViewNagorik($id)
    {
        $view = DB::table('sanad_applies')->where('id', $id)->first();
        return view('admin.list.view_nagorik_certificate', compact('view'));
    }

    public function AllWarishSonod()
    {
        $all = DB::table('warish_certificates')->orderBy('id', 'DESC')->get();
        return view('admin.list.all_warish_sonod', compact('all'));
    }

    public function ApprovedWarish($id)
    {
        $date = date('Y-m-d');
        DB::table('warish_certificates')
            ->where('id', $id)
            ->update(['status' => 1, 'date' => $date]);
        $notification = array(
            'messege' => 'Successfully, This Warish Sonod Has been Inactived',
            'alert-type' => 'success'
        );
        return redirect('/all-warish_sonod')->with($notification);
    }

    public function InactivedWarish($id)
    {
        $date = date('Y-m-d');
        DB::table('warish_certificates')
            ->where('id', $id)
            ->update(['status' => 0, 'date' => $date]);
        $notification = array(
            'messege' => 'Successfully, This Warish Sonod Has been Inactived',
            'alert-type' => 'success'
        );
        return redirect('/all-warish_sonod')->with($notification);
    }

    public function ViewWarish($id)
    {
        $view = DB::table('warish_certificates')->where('id', $id)->first();
        return view('admin.list.view_warish', compact('view'));
    }

    public function AllDeadSonod()
    {
        $all = DB::table('death_certficated')->orderBy('id', 'DESC')->get();
        return view('all_dead_sonod', compact('all'));
    }

    public function ApprovedDeadSonod($id)
    {
        $date = date('Y-m-d');
        DB::table('death_certficated')
            ->where('id', $id)
            ->update(['status' => 1, 'date' => $date]);
        $notification = array(
            'messege' => 'Successfully, This Dead Sonod Has been Actived',
            'alert-type' => 'success'
        );
        return redirect('/all-dead_sonod')->with($notification);
    }

    public function InactivedDeadSonod($id)
    {
        $date = date('Y-m-d');
        DB::table('death_certficated')
            ->where('id', $id)
            ->update(['status' => 0, 'date' => $date]);
        $notification = array(
            'messege' => 'Successfully, This Dead Sonod Has been Inactived',
            'alert-type' => 'success'
        );
        return redirect('/all-dead_sonod')->with($notification);
    }

    public function ViewDeadSonod($id)
    {
        $view = DB::table('death_certficated')->where('id', $id)->first();
        return view('view_death_sonod', compact('view'));
    }

    public function AllOrphanSonod()
    {
        $all = DB::table('orphan_certficates')->orderBy('id', 'DESC')->get();
        return view('all_orphan_sonod', compact('all'));
    }

    public function ApprovedOrphanSonod($id)
    {
        $date = date('Y-m-d');
        DB::table('orphan_certficates')
            ->where('id', $id)
            ->update(['status' => 1, 'date' => $date]);
        $notification = array(
            'messege' => 'Successfully, This Dead Sonod Has been Actived',
            'alert-type' => 'success'
        );
        return redirect('/all-orphan_sonod')->with($notification);
    }

    public function InactivedOrphanSonod($id)
    {
        $date = date('Y-m-d');
        DB::table('orphan_certficates')
            ->where('id', $id)
            ->update(['status' => 0, 'date' => $date]);
        $notification = array(
            'messege' => 'Successfully, This Dead Sonod Has been Inactived',
            'alert-type' => 'success'
        );
        return redirect('/all-orphan_sonod')->with($notification);
    }

    public function ViewOrphanSonod($id)
    {
        $view = DB::table('orphan_certficates')->where('id', $id)->first();
        return view('view_orphan', compact('view'));
    }
}
