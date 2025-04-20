@extends('layouts.app')

@section('title', 'P1 Production')

@section('p1prod')

<hr>

<div class="tables mt-4">
    <table id="p1prodTable" class="table table-bordered table-striped compact-table">
        @include ('table-header')
        <tbody>
            <!-- The rows will be inserted dynamically -->
        </tbody>
    </table>
</div>




@endsection
