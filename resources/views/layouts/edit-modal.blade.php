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
                <div class="col-md-2 mb-3">
                <label for="editProcessor">Processor</label>
                <input type="text" class="form-control" id="editProcessor" name="processor">
                </div>
            </div>

            <div class="form-row">
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
                <div class="col-md-4 mb-3">
                <label for="editRemarks">Remarks</label>
                <input type="text" class="form-control" id="editRemarks" name="remarks">
                </div>
            </div>
        </div>


        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
  /* Center modal vertically */
  .modal-dialog {
    display: flex;
    align-items: center ;
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
  .modal-body  {
    margin: 20px;
    box-shadow: none;
    transition: border-color 0.3s ease-in-out;
  }

  .modal-footer {
    border-top: 1px solid #dee2e6;
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
  }
  .form-row label{
    font-weight: 600;
  }
</style>
