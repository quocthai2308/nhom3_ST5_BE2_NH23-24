@extends('admin.nav')
@section('title', 'Dashboard')
@section('content')
<style>
.revenue-chart{
width: 500px;
position: absolute;
top :100px;
left: 50px;
}
</style>
<h1>Dashboard</h1>
<div class="container-fluid">
    <div class="revenue-chart">
        <canvas id="myChart"></canvas>
        <div class="btn-group">
            <div class="btn btn-primary">Tháng</div>
            <div class="btn btn-success">Năm</div>
        </div>
    </div>
</div>
@endsection
