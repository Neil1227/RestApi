
@extends('layouts.app')

@section('title', 'All List')

@section('all-list')

<hr>
    <!-- Search Bar --> 

    <div class="action-btn">
      <button type="button" class="btn btn-primary open-add-modal" data-toggle="modal" data-target="#addRecordModal">
        Add new record <i class="fas fa-plus"></i>
      </button>
    </div>


     <div class="tables mt-4">
      <table id="allListTable" class="table table-bordered table-striped compact-table">
        @include ('table-header')
          <tbody>

          </tbody>
      </table>
    </div>

  @endsection