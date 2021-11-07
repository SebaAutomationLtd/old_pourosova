@extends('member_master')
@section('member_content')


<div class="col-lg-9 mt-4 mt-lg-0">
    <div class="dashboard-body">
        <div class="content-header">
            লাইসেন্স নবায়ন ফী পরিশোধ করুন
         
        </div>
        <div class="content py-5">
          <form action="{{URL::to('/fee-paid')}}" method="post">
          	@csrf
           <div class="form-group">
           	 <label for="payment_type">Payment Type</label>
           	 <select class="form-control" name="payment_type">
           	 	<option vlaue="" selected="" disabled="">--পেমেন্ট টাইপ নির্বাচন করুন--</option>
           	 	<option value="amar_pay" style="display: none;">আমার পে</option>
              <option value="1">হ্যান্ড ক্যাশ</option>
           	 	<option value="2">বিকাশ</option>
           	 	<option value="3">নগদ</option>
           	 </select>
           </div>
           <button type="submit" class="btn btn-success">পরিশোধ করুন</button>
          </form>
        </div>
     </div>
 </div>

@endsection