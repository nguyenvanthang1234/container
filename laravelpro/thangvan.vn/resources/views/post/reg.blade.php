<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <h1>them bai viet</h1>
        {{-- la phan laravelCollection  --}}
        {!! Form::open(['url' => 'post/store', 'method' => 'POST']) !!}

        <div class="from-group">
           {!!Form::label('username','ten dang nhap')!!}
           {!!Form::label('username','',["class"=>'form-control'])!!}
        </div>
        <div class="from-group">
            {!!Form::label('password','mat khau')!!}
            {!!Form::label('password','',["class"=>'form-control'])!!}
        </div>
        <div class="from-group">
            {!!Form::label('email','email')!!}
            {!!Form::label('email','',["class"=>'form-control'])!!}
        </div>
        <div class="from-group">
            {!!Form::label('city','thanh pho')!!}     
            {!! Form::select('country',['1' => 'ha noi','2'=>'hcm','3'=>'thai binh','4'=>'nam dinh'],null, ['class'=>'form-control','placeholder'=>'Select Country']) !!}
        </div>
        <div class="from-group">
            {!!Form::label('gender','gioi tinh')!!}  
            <div class="form-check">
                {!!Form::radio('gender','male','',['class'=>'form-check-input','id'=>'male'])!!}
                {!!Form::label('male','nam',['class'=>'form-check-label'])!!} 
            </div>   
            <div class="form-check">

                {!!Form::radio('gender','female','',['class'=>'form-check-input','id'=>'female'])!!}
                {!!Form::label('female','nu',['class'=>'form-check-label'])!!}
               
            </div>   
        </div>
        <div class="from-group">
            {!!Form::label('skill','ki nang')!!}  
            <div class="form-check">
                {!!Form::radio('skill','html','',['class'=>'form-check-input','id'=>'html'])!!}
                {!!Form::label('html','Html',['class'=>'form-check-label'])!!} 
            </div>   
            <div class="form-check">

                {!!Form::radio('skill','css','',['class'=>'form-check-input','id'=>'css'])!!}
                {!!Form::label('css','Css',['class'=>'form-check-label'])!!} 
            </div>   
        </div>
        <div class="from-group">
            {!!Form::label('date','ngay sinh')!!}  
            {!!Form::date('date','',['class'=>"form-control"])!!}            
        </div>
        <div class="from-group">
            {!!Form::label('intro','gioi thieu ban than')!!}  
            {!!Form::textarea('intro','',['class'=>"form-control","id"=>"intro"])!!}            
        </div>


        {!! Form::close() !!}
      
    </div>

</body>

</html>
