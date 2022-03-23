@extends('layouts.appdash')

@section('content')
<div class="container">
    <div class="card" style="position: absolute;width: 100vw;height: 100vh;left: 0;top: 0;">
        <div class="card-body" id="app" style="overflow:hidden">
            <chat-app2 :user="{{ auth()->user() }}" style="width: 100vw;height: 100vh;"></chat-app2>
        </div>
    </div>
</div>
@endsection