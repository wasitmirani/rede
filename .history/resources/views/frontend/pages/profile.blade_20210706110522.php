@extends('layouts.frontend.messengermaster')
@section('content')
<div class="container m-auto">

    <h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3"> Account Setting </h1>
    <div class="col-md-6">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#currentPreferences">Current Preferences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#alternative"> Alternative </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link">Link</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="currentPreferences">
                <ul class="list-group media-list media-list-stream">
                    <p>Pref</p>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="alternative">
                <ul class="list-group media-list media-list-stream">
                    <p>Test</p>
                </ul>
            </div>
             <div role="tabpanel" class="tab-pane fade in" id="link">
                <ul class="list-group media-list media-list-stream">
                    <p>Link</p>
                </ul>
            </div>
        </div>
    </div>






</div>

@endsection

