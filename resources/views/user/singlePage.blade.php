@extends('layouts.app')
@extends('layouts.sidebar')

@section('singlepage')

<div class='body'>
    <div id="app">
        <singlepage-page movieid="{{$id}}" ></singlepage-page>
    </div>
</div>
@endsection