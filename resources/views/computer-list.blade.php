
@extends('layouts.app')

@section('title', 'Computer list')

@section('computer-list')
<h2 style="margin: 10px 10px 25px 70px;">
    Computer Names
</h2>
<hr>

    <div class="tables mt-4">
      <table id="computerTable" class="table table-bordered table-striped compact-table">
      <thead class="thead-dark">
          <tr>
              <th>Superl Philippines Inc.</th>										
              <th>Siglo Leatherware</th>
              <th>Angeles Alliance Leatherware</th>
          </tr>
      </thead>
      <tbody>
          <!-- Rows will be populated here -->
      </tbody>
  </table>

    </div>

  @endsection