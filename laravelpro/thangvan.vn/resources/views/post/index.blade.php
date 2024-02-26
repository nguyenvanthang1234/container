<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> trang danh sach bai viet</h1>
    {{-- hien thi stsatus --}}
     @if(session('status'))
        <div class="alert alert-success">
            {{session("status")}}
        </div>
    @endif
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="">{!!$post->title!!}</a>
                {{-- <img src="{{url($post->thumbnail)}}" alt=""> --}}
                <p>{!!$post->content!!}</p>
            </li>
            
        @endforeach
        
    </ul>
    {{-- phan trang --}}

    {{$posts->appends(["sort"=>"votes"])->links()}}
    
</body>
</html>