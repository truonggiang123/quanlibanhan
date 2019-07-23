@extends('layouts.master')
@section('title')
loi chao
@endsection
@section('content')
<div id="body">
    Hello<br>
</div>
<?php
$hoten = "<b>Huynh NGuyen Truong Giang</b>"
?>
in ra co excape la: {{ $hoten }}</br>
in ra khong co excape la: {!! $hoten !!}</br>
in ra co dau la: @{{ $hoten }}</br>
<?php
$gioitinh = 0;
?>
@if($gioitinh==0)
{!! $hoten."la nam" !!}
@elseif($gioitinh==1)
{{ $hoten."la nu" }}
@else
{{ $hoten."Khong cong bo" }}
@endif
@endsection