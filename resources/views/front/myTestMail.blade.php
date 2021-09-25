<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    <title>شركة ابو اسكندر </title>
</head>
<body>
    <div style="display: inline-flex">   <a ><img src="{{asset('front/images/logo.jpg')}}"  class="img-head" alt="" style="width: 60px;padding:0 9px"></a>
        <h1 style="text-align: center">شركة ابو اسكندر    </h1>

    </div>
    <hr>
    <div class="container">
        <h2>    مرحبا عزيزي :</h2>

        <h4>الموضوع :</h4>
        <p>{{ $details['Message'] }}</p>

        <br>
        <br>
        <br>

        <h4>بيانات المرسل  : </h4>
        <p><span>الاسم : {{ $details['Name'] }}</span> </p>
        <p><span> الايميل  :{{ $details['Email'] }}</span></p>
    </div>


    
   
    <p>شكرا لك </p>
</body>
</html>