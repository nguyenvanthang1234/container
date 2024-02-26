@extends('layouts.app')

@section('title',"tieu de trang child")


@section('content')


<p>nd trang con</p>

{{--  kiem tra xemco rong hay ko --}}

@isset($post_title)
    <p>tieu de :{{$post_title}}</p>
@endisset

@empty($users)
    {{--  day la truong hop no rong --}}
    <p>ko co user nao</p>
@endempty


{{-- <p>ho va ten :{!!$data!!}</p> --}}
@if($data %2==0)
    <p>{{$data}} la so chan</p>
@else
    <p>{{$data}} la so le</p>
@endif




@endsection

@section('sidebar')
@parent
<p>sidebar trang con</p>
@endsection

    
