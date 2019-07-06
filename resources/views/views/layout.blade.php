@extends('views.master')
@section('title','Layout Template')
@section('content')
@for($i =0;$i <= 10;$i = $i+1)
    Số thứ tự: {{ $i }} <br/>
@endfor
<hr/>
<?php $i = 0; ?>
@while($i <= 10)
    Số thứ tự: {{ $i }} <br/>
    <?php $i++; ?>
@endwhile

<?php 
$array = ["cơm","cháo","phở"];?>

@foreach($array as $item)
{{ $item }}

@endforeach
@if(Auth::check())
{{ Auth::user()->name }}
@endif
@endsection