@extends('starfleet.layout')

@section('content')

<div class="row justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <div class="text-white mb-5 mt-5">
                <center>
                    <h2>Add New Starship to the Galactic Fleet</h2>
                </center>
            </div>
        </div>

    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 margin-tb">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <create-component form="{{ route('fleet.store') }}"></create-component>
        <div class="col-md-12 text-start mt-4 ml-5">
            <a class="pl-5 text-white left" href="{{ route('fleet.index') }}">
                Back</a>
        </div>
    </div>

</div>

@endsection