@extends('layouts.app')
@extends('layouts.sidebar')

@section('header_style')
    <link rel="stylesheet" href="{{ asset('css/profileEdit.css') }}">
@stop

@section('profileedit')
<body>
    <form action="{{route('profile.update')}}" method="POST"  enctype="multipart/form-data">
        @csrf
    <div class='body'>
        <div id='settings' ontouchstart>
            <input checked class='nav' name='nav' type='radio'>
            <span class='nav'>Profile</span>
            <main class='content'>
                <section id='profile'>
                    <form>
                        <ul>
                            <li class='large padding avatar'>
                                <span style="background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/345377/selca-square.jpg');"></span>
                                <div>
                                    <fieldset class='material-checkbox'>
                                        <div>
                                            <input checked type='checkbox' >
                                            <div class='check'>
                                                
                                                <label>Use Name</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class='material-button'>
                                        <div>
                                            <input id="inputFile" name="image" type="file" accept="image/*"/>
                                        </div>
                                    </fieldset>
                                </div>
                            </li>
                            <li>
                                <fieldset class='material'>
                                    <div>
                                        <input required type='text' name="name">
                                        <label>Name</label>
                                        <hr>
                                    </div>
                                </fieldset>
                            </li>
                            
                            <li>
                                <fieldset class='material'>
                                    <div>
                                        <input required type='text'  name="email">
                                        <label>Email</label>
                                        <hr>
                                    </div>
                                </fieldset>
                            </li>
                            <li>
                                <fieldset class='material'>
                                    <div>
                                        <input required type='text'  name="phone">
                                        <label>Phone</label>
                                        <hr>
                                    </div>
                                </fieldset>
                            </li>
                            <li class='large'>
                                <fieldset class='material'>
                                    <div>
                                        <input required type='text'  name="about">
                                        <label>About</label>
                                        <hr>
                                    </div>
                                </fieldset>
                            </li>
                            <li class='large padding'>
                                <fieldset class='material-button center'>
                                    <div>
                                        <input class='save' type='submit' value='Save'>
                                    </div>
                                </fieldset>
                            </li>
                        </ul>
                    </form>
                </section>
            </main>
        </div>
    </div>
</form>
</body>
@endsection
