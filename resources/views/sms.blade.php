<!DOCTYPE html>
<html>
<head>
	<title>OTP | SMS Verification</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>  

</head>
<body>
 
    


  <div align="center" class="container" style="margin-top: 10px;">
  	<form  action="{{URL::to('/code-verification')}}" method="post">
 	@csrf

 	 
     <div class="form-group">
      <label for="sms"><b>Verification Code</b></label>
      <input  style="width: 300px; margin-left: 20px;" type="number" class="form-control" name="code" id="sms" placeholder="Enter Sms Verification Code">
     </div>

    <button style="margin-top: 10px;" type="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
    </script>

</body>
</html>