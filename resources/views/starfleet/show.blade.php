@extends('starfleet.layout')

@section('content')
<?php
use Illuminate\Support\Facades\DB;
$starfleets = DB::select('select * from starfleets');
$armaments = DB::select('select * from armaments');
foreach ($armaments as $fleet) {
    $armour = $fleet;
    $obj_id = $fleet->obj_id;
}
foreach ($starfleets as $fleet) {
    $name = $fleet->name;
}
?>
<div class="stars">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-white mb-5 mt-5">
                        <center>
                            <h2> Show {{ $name }} Stats</h2>
                        </center>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @foreach ($starfleet as $starfleet)
    @if($starfleet->id == $id)
    <div class="row justify-content-center flex-wrap">

        <div class="col-md-3 col-lg-3 col-sm-12 m-2 p-4 card">
            <div class="post-header col-12 py-2 px-3">
                <img width="100%" height="300px" src="/uploads/{{ $starfleet->image }}"><br><br>
                <div class="text-white col-12 justify-content-left">
                    <h4>Name: {{ $starfleet->name }}</h4>
                    <h4>Class: {{ $starfleet->class }}</h4>
                    <h4>Crew: {{ $starfleet->crew }}</h4>
                    <h4>Value: {{ $starfleet->value }}</h4>
                    @if($obj_id === $starfleet->obj)
                    <h4 class="mb-2 mt-2">Armaments</h4>
                    <h4>Title: {{ $armour->title }}</h4>
                    <h4>Qty: {{ $armour->qty }}</h4>
                    @endif
                </div>
            </div>
            <br><br>

            <div class="col-1 float-right text-right"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></div>
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
            @endif
        </div>
    </div>
    <div class="col-md-12 text-start px-5 mt-4">
        <a class="text-white" href="{{ route('fleet.index') }}">
            < Back</a>
    </div>
</div>
@endif
@endforeach
@endsection