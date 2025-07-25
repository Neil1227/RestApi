<!-- Edit Computer Modal -->

<!-- Add Record Modal -->
<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <form id="addRecordForm">
        <div class="modal-header">
          <h5 class="modal-title" id="addRecordModalLabel">Add New Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body px-3">
            <div class="form-row">                
                <div class="col-2 mb-3">
                  <label for="factory" class="form-label">Factory</label>
                  <select class="form-control" id="factory" name="factory">
                    <option value="">Select</option>
                    <option value="p1adminbldg">P1 Admin Building</option>
                    <option value="p1bldga">P1 Building A</option>
                    <option value="p1whBldg">P1 Warehouse Building</option>
                    <option value="p1prod">P1 Production</option>
                    <option value="p2">P2 Production</option>
                    <option value="p3">P3 Production</option>
                    <option value="p5">P5 Production</option>
                    <option value="p6">P6 Production</option>
                  </select>
                </div>
                <div class="col-md-2 mb-3">
                <label for="Department">Department</label>
                <input type="text" class="form-control" id="Department" name="department">
                </div>
                <div class="col-md-2 mb-3">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="Username" name="username">
                </div>
                <div class="col-md-2 mb-3">
                <label for="ComputerName">Computer Name</label>
                <input type="text" class="form-control" id="ComputerName" name="computer_name">
                </div>
                <div class="col-md-2 mb-3">
                <label for="Model">Model</label>
                <input type="text" class="form-control" id="Model" name="model">
                </div>
                <div class="col-md-2 mb-3">
                <label for="PCGrade">PC Grade</label>
                <input type="text" class="form-control" id="PCGrade" name="pc_grade">
                </div>

            </div>

            <div class="form-row">
                <div class="col-md-2 mb-3">
                <label for="Processor">Processor</label>
                <input type="text" class="form-control" id="Processor" name="processor">
                </div>
                <div class="col-md-2 mb-3">
                <label for="RAM">RAM</label>
                <input type="text" class="form-control" id="RAM" name="ram">
                </div>
                <div class="col-md-2 mb-3">
                <label for="Storage">Storage</label>
                <input type="text" class="form-control" id="Storage" name="storage">
                </div>
                <div class="col-md-2 mb-3">
                <label for="IPAddress">IP Address</label>
                <input type="text" class="form-control" id="IPAddress" name="ip_address">
                </div>
                <div class="col-md-2 mb-3">
                <label for="OS">Operating System</label>
                <input type="text" class="form-control" id="OS" name="os">
                </div>
                <div class="col-md-2 mb-3">
                <label for="Remarks">Remarks</label>
                <input type="text" class="form-control" id="Remarks" name="remarks">
                </div>
            </div>
        </div>


        <div class="modal-footer">
          <button type="submit" class="btn"style="color:white;background-color: #B71C1C;">Save Record <i class="bi bi-floppy"></i></button>
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
