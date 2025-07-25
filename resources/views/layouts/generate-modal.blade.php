<!-- Generate Modal -->
<div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="generateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-0 rounded-3">
      <div class="modal-header">
        <h5 class="modal-title" id="generateModalLabel">Generate Report Excel File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="generateForm">
          <div class="form-group mb-3">
            <label for="selectTable">Select table to generate excel file:</label>
            <select class="form-control" id="selectTable" name="table">
              <option value="" disabled selected>Select an option</option>
              <option value="p1adminbldg">P1 Admin Building</option>
              <option value="p1prod">P1 Production</option>
              <option value="p1bldga">P1 Building A</option>
              <option value="p1whbldg">P1 Warehouse</option>
              <option value="p2">P2</option>
              <option value="p3">P3</option>
              <option value="p5">P5</option>
              <option value="p6">P6</option>
            </select>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn"style="color:white;background-color: #B71C1C;">Generate <i class="bi bi-arrow-clockwise"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('generateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const selectedValue = document.getElementById('selectTable').value;
    if (selectedValue) {
      console.log('Generating for:', selectedValue);
      // Add your logic here (e.g., fetch, Axios, etc.)
      $('#generateModal').modal('hide'); // Hide modal after action
    }
  });
</script>
