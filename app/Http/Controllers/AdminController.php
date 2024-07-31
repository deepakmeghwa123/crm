<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    //
    public function index()
    {
        if(session()->get('type')=='admin')
        {
            $total_applicant=DB::table('registration')
                                 ->count();
            $total_recruiter=DB::table('recruiter')
                                ->count();
            $con_app=DB::table('registration')
                                ->where('contact','contacted')
                                ->count();
            $out_app=DB::table('registration')
                                ->where('contact','out')
                                ->count();

             return view('dashboard.users',compact('total_applicant','total_recruiter','con_app','out_app'));
        }
        return redirect()->back();

    }
    public function updateRecruiter(Request $request)
{
    if(session()->get('type')=='admin')
    {
    $applicantId = $request->input('applicant_id');
    $recruiterId = $request->input('recruiter_id');

    try {
        DB::table('registration')
            ->where('id', $applicantId)
            ->update(['Recruiter' => $recruiterId]);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}
return redirect()->back();

}

public function updateApplicantField(Request $request)
{
    if(session()->get('type')=='admin')
    {
    $applicantId = $request->input('applicant_id');
    $fieldName = $request->input('field_name');
    $fieldValue = $request->input('field_value');

    try {
        DB::table('registration')
            ->where('id', $applicantId)
            ->update([$fieldName => $fieldValue]);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}
return redirect()->back();

}

    public function applicant()
    {
         if(session()->get('type')=='admin')
    {
            $applicant=DB::table('registration')            
            ->paginate(6);
            $recruiters=DB::table('recruiter')
            ->get();
            return view('dashboard.applicant',compact('applicant','recruiters'));
        }
         return redirect()->back();

    }
    public function users()
    {
      if(session()->get('type')=='admin')
        {
            
            $applicant=DB::table('registration')
            // ->where('type','customer')
            ->paginate(10);

             return view('dashboard.users',compact('applicant'));
        }
        


    }
        
}
