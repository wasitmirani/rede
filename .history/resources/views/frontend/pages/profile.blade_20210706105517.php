@extends('layouts.frontend.messengermaster')
@section('content')
<div class="container m-auto">

    <h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3"> Account Setting </h1>
    <ul class="nav nav-tabs"  id="tabs-nav">
        <li  class="nav-item"><a class="nav-link" href="#tab1" role="tab">Profile</a></li>
        <li  class="nav-item"><a class="nav-link" href="#tab2" role="tab">Privacy</a></li>

    </ul>
    <div id="tabs-content">
        <div id="tab1" class="tab-content">
            Teacher
        </div>
        <div id="tab2" class="tab-content">
            Student
        </div>
    </div>





</div>

@endsection

