@extends('starfleet.layout')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-white mb-5 mt-5">
                <center>
                    <h2>Edit Starship</h2>
                </center>
            </div>

        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>

    @endif
    @foreach ($starfleet as $starfleet)
    @if($starfleet->id == $id)
    <edit-component fleet="{{ $starfleet->name }}" fleet-id="{{ $starfleet->id }}" form-edit="{{ route('fleet.store', $starfleet->id) }}"></edit-component>
 
    @endif
    @endforeach
    <div class="pull-left">
        <a class="text-white" href="{{ route('fleet.index') }}" enctype="multipart/form-data"> Back</a>
    </div>
</div>
@endsection