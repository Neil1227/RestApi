<!-- Edit Computer Modal -->
<div class="modal fade" id="editComputerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="editComputerForm">
        <div class="modal-header">
          <h5 class="modal-title">Edit Computer Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body px-3">
          <input type="hidden" name="id" id="editId">
          <input type="hidden" name="table" id="editTable">
          <div class="form-row">
            <div class="col-md-2 mb-3">
              <label for="factory" class="form-label">Factory</label>
              <select class="form-control" id="factory-edit" name="factory">
                <option value="">Select</option>
                <option value="p1adminbldg">P1 Admin Building</option>
                <option value="p1bldga">P1 Building A</option>
                <option value="p1whbldg">P1 Warehouse Building</option>
                <option value="p1prod">P1 Production</option>
                <option value="p2">P2 Production</option>
                <option value="p3">P3 Production</option>
                <option value="p5">P5 Production</option>
                <option value="p6">P6 Production</option>
              </select>
            </div>
            <div class="col-md-2 mb-3">
              <label for="editDepartment">Department</label>
              <input type="text" class="form-control" id="editDepartment" name="department">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editUsername">Username</label>
              <input type="text" class="form-control" id="editUsername" name="username">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editComputerName">Computer Name</label>
              <input type="text" class="form-control" id="editComputerName" name="computer_name">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editModel">Model</label>
              <input type="text" class="form-control" id="editModel" name="model">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editPCGrade">PC Grade</label>
              <input type="text" class="form-control" id="editPCGrade" name="pc_grade">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-2 mb-3">
              <label for="editProcessor">Processor</label>
              <input type="text" class="form-control" id="editProcessor" name="processor">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editRAM">RAM</label>
              <input type="text" class="form-control" id="editRAM" name="ram">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editStorage">Storage</label>
              <input type="text" class="form-control" id="editStorage" name="storage">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editIPAddress">IP Address</label>
              <input type="text" class="form-control" id="editIPAddress" name="ip_address">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editOS">Operating System</label>
              <input type="text" class="form-control" id="editOS" name="os">
            </div>
            <div class="col-md-2 mb-3">
              <label for="editRemarks">Remarks</label>
              <input type="text" class="form-control" id="editRemarks" name="remarks">
            </div>

          </div>
        </div>


        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-success" id="moveRecordBtn"><i class="bi bi-share"></i></button>
          <button type="button" class="btn btn-warning text-white" id="copyRecordBtn"><i class="bi bi-copy"></i></button> -->
          <button type="submit" class="btn" style="color:white;background-color: #B71C1C;">Save Changes <i class="bi bi-floppy-fill"></i></button>
        </div>

      </form>
    </div>
  </div>
</div>
<script>
  function populateEditModal(data) {
    const fields = [
      'department', 'username', 'computer_name', 'model', 'pc_grade',
      'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks'
    ];

    // Set factory dropdown
    document.getElementById('factory-edit').value = data.factory || '';

    // Set text input fields
    fields.forEach(field => {
      const input = document.getElementById('edit' + toPascalCase(field));
      const value = (data[field] || '').trim();

      if (value && value !== '-') {
        input.value = value;
        input.placeholder = '';
      } else {
        input.value = ''; // Important: leave empty so placeholder shows
        input.placeholder = '-';
      }
    });

    document.getElementById('editId').value = data.id || '';
    document.getElementById('editTable').value = data.table || '';
  }

  function toPascalCase(str) {
    return str.replace(/_([a-z])/g, g => g[1].toUpperCase()).replace(/^./, s => s.toUpperCase());
  }
</script>
<style>
  /* Center modal vertically */
  .modal-dialog {
    display: flex;
    align-items: center;
    min-height: calc(80% - 1rem);
  }

  /* Modern modal look */
  .modal-content {
    border-radius: 1rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    border: none;
  }

  .modal-title {
    font-weight: 600;
  }

  /* Form spacing and aesthetics */
  .modal-body {
    margin: 20px;
    box-shadow: none;
    transition: border-color 0.3s ease-in-out;
  }

  .modal-footer {
    border-top: 1px solid #dee2e6;
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
  }

  .form-row label {
    font-weight: 600;
  }
</style>