
@extends('layouts.app')

@section('title', 'P5 Production')

@section('p5')
<hr>

     <div class="tables mt-4">
      <table id="p5Table" class="table table-bordered table-striped compact-table">
      @include ('table-header')
              <tbody>
          </tbody>
      </table>
    </div>

  @endsection