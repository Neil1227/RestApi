
@extends('layouts.app')

@section('title', 'All List')

@section('all-list')

<hr>
    <!-- Search Bar --> 
      <div class="action-btn btn-group">      
          <button type="button" class="btn generate-modal px-3" data-toggle="modal" data-target="#generateModal">
            Export Record <i class="bi bi-download"></i>
          </button>
          <button type="button" class="btn-add open-add-modal px-3" data-toggle="modal" data-target="#addRecordModal">
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