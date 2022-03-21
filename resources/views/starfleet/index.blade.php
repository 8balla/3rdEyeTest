@extends('starfleet.layout')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8 margin-tb">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->is_admin == 1)
                <center>
                    <h1 class="text-white">The Force is with you JEDI</h1>
                    @else <h1 class="text-white">Find the Force to create Inventory</h1>
                </center>
                @endif
                <div class="text-white mb-5 mt-5">
                    <center>
                        <h2>Your Galactic Fleet</h2>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center flex-wrap">

        @if(count($starfleet) > 0)
        @foreach ($starfleet as $starfleet)
        <div class="col-md-3 col-lg-3 col-sm-12 m-2 p-4 card">
            <div class="post-header col-12 py-2 px-3">
                <img width="100%" height="300px" src="/uploads/{{ $starfleet->image }}"><br><br>
                <div class="col-12 justify-content-left text-white">
                    <h4>Name: {{ $starfleet->name }}</h4>
                    <h4>Class: {{ $starfleet->class }}</h4>
                    <h4>Crew: {{ $starfleet->crew }}</h4>
                    <h4>Value: {{ $starfleet->value }}</h4>
                    @if($armour->obj_id === $starfleet->obj)
                    <h4 class="mb-2 mt-2">Armaments</h4>
                    <h4>Title: {{ $armour->title }}</h4>
                    <h4>Qty: {{ $armour->qty }}</h4>
                    @endif
                </div>
            </div>
            <br><br>

            <!-- <div class="col-1 float-right text-right"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></div> -->
            @if(Auth::user()->is_admin == 1)
            <form action="{{ route('fleet.destroy',$starfleet->id) }}" method="POST">
                <center>
                    <a class="btn btn-info btn-sm text-white" href="{{ route('fleet.show',$starfleet->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('fleet.edit',$starfleet->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </center>
            </form>
            @else
            <h1>You are not Jedi enough to edit Starships</h1>
            @endif
        </div>

        @endforeach
        @else
        <div class="row">
            <a class="dropdown-item" href="{{ route('fleet.create') }}">Add Inventory</a>
        </div>
        @endif
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-3 justify-content-center">
        <span class="justify-content-center">{{ $message }}</span>
    </div>
    @endif
    @endsection