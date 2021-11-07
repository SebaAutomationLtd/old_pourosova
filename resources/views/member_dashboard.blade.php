@extends('member_master')
@section('member_content')

<div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="dashboard-body">
                        <div class="content-header">
                            প্রোফাইলের তথ্য দেখুন
                        </div>
                        @php
                         $role = DB::table('users')->where('user_id',$data->user_id)->first();
                        @endphp
                        <div class="content py-5">
                            <table class="data">
                              @if($role->role == 'Business Hold Reg')
                                <tr>
                                    <th>নাম</th>
                                    <td>{{ $data->owner_name }}</td>
                                </tr>
                             @else
                               <tr>
                                    <th>নাম</th>
                                    <td>{{ $data->name }}</td>
                                </tr>
                             @endif
                             @if($data->father_name == NULL)
                                <tr>
                                    <th>স্বামীর নাম</th>
                                    <td>{{ $data->husband_name }}</td>
                                </tr>
                            @else
                                 <tr>
                                    <th>পিতার নাম</th>
                                    <td>{{ $data->father_name }}</td>
                                </tr>
                            @endif
                                <tr>
                                    <th>মাতার নাম</th>
                                    <td>{{ $data->mother_name }}</td>
                                </tr>
                                <tr>
                                    <th>মোবাইল</th>
                                    <td>{{ $data->mobile }}</td>
                                </tr>
                                <tr>
                                    @if($data->nid == NULL)
                                    <th>জন্ম নিবন্ধন নম্বর</th>
                                    <td>{{ $data->birth_certificate }}</td>
                                   @else
                                    <th>এনআইডি</th>
                                    <td>{{$data->nid}}</td>
                                   @endif
                                </tr>
                              
                                
                            </table>
                        </div>
                    </div>
                </div>

<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">প্রোফাইল ভেরিফিকেশন</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         প্রোফাইল ভেরিফিকেশন হতে সময় লাগবে সর্বোচ্চ ৭২ ঘন্টা
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){  
        $('.fade').modal('show'); 
       
  });
 
 </script>
@endsection


