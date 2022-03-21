@extends('starfleet.layout')

@section('content')
<?php
use Illuminate\Support\Facades\DB;
$starfleets = DB::select('select * from starfleets');
foreach ($starfleets as $fleet) {
    $name = $fleet->name;
}
?>
<div class="clouds stars twinkling y-scroll">
    <fleet-component fleet="{{ $name }}" fleetUrl="{{ route('fleet.index') }}" createUrl="{{ route('fleet.create') }}"></fleet-component>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>
@endsection