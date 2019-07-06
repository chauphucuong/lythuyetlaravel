@extends('views.master')
@section('title','Sub Template')

@section('sidebar')
Nằm phía dưới    
@parent
@stop

@section('content')
Đây là trang sub
<br />
<?php $hoten="<b>Khoa phạm Training</b>"; ?> 
{{ $hoten }}
<br />
{{-- Không hiển thị các kí tự đặc biệt --}}
{!! $hoten !!}
<br />
<?php $diem =10; ?>
@if($diem <= 5)
    Học sinh Yếu
@elseif($diem >=5 && $diem <= 7)
    Học sinh trung bình
@else
    Học sinh giỏi
@endif

{{ isset($diem) ? $diem : ' Không có điểm' }}

{{ isset($diemm) ? $diemm : ' Không tồn tại biến điểm' }}
<hr />
{{-- Chưa sử dụng được biết or --}}
{{ $hoten or 'Không tồn tại biến điểm' }}
@endsection