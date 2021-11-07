@extends('member_master')
@section('member_content')
<div class="col-lg-9 mt-4 mt-lg-0">
    <div class="dashboard-body">
        <div class="content-header" style="padding: 15px;">
            সনদপত্র/প্রত্যয়ন জন্য আবেদন করুন
        </div>
        <div class="content">  
          <form method="POST" action="{{ route('sanad.view') }}">
            @csrf
            <div class="form-row">
              <div class="col-10">
                 <select class="form-control" id="exampleFormControlSelect1" name="nagarik_sanad" required>
                    <option value="" selected="" disabled="">সনদপত্র/প্রত্যয়ন নির্বাচন করুন</option>
                    <option value="1">নাগরিক সনদ</option>

                     <option value="3">ওয়ারিশ সনদ</option>
                    
                    <option value="2">চারিত্রিক সনদ</option> 
                    
                    <option value="4">মৃত্যু সনদ</option>
                    
                    
                    <option value="5">এতিম সনদ</option>
                  </select>
              </div><br>
              
            </div>
            <button style="margin-top: 5px;" type="submit" class="btn btn-success">Submit</button>
          </form> 
        </div>
    </div>
</div>

  

 

</script>
@endsection
