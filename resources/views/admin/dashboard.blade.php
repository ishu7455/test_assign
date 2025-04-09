@extends('layouts.app')
@section('content')
<div>
<h1>HI {{Auth::user()->name}}</h1>
</div>
@endsection
