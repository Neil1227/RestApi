<!-- Add Record Modal -->
<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="addRecordForm">
        <div class="modal-header">
          <h5 class="modal-title" id="addRecordModalLabel">Add New Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- Collapsible Sections -->
          <div class="section">
            <button type="button" class="collapsible btn btn-secondary btn-block text-left">General Information</button>
            <div class="content" style="display: none;">
              <div class="row">
                <div class="col-4 mb-3">
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
                <div class="col-4 mb-3">
                  <label for="department" class="form-label">Department</label>
                  <input type="text" class="form-control" id="department" name="department">
                </div>
                <div class="col-4 mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>
              </div>
            </div>
          </div>

          <div class="section">
            <button type="button" class="collapsible btn btn-secondary btn-block text-left">Hardware Information</button>
            <div class="content" style="display: none;">
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="computer_name" class="form-label">Computer Name</label>
                  <input type="text" class="form-control" id="computer_name" name="computer_name">
                </div>
                <div class="col-6 mb-3">
                  <label for="model" class="form-label">Model</label>
                  <input type="text" class="form-control" id="model" name="model">
                </div>
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="pc_grade" class="form-label">PC Grade</label>
                  <input type="text" class="form-control" id="pc_grade" name="pc_grade">
                </div>
                <div class="col-6 mb-3">
                  <label for="processor" class="form-label">Processor</label>
                  <input type="text" class="form-control" id="processor" name="processor">
                </div>
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="ram" class="form-label">RAM</label>
                  <input type="text" class="form-control" id="ram" name="ram">
                </div>
                <div class="col-6 mb-3">
                  <label for="storage" class="form-label">Storage</label>
                  <input type="text" class="form-control" id="storage" name="storage">
                </div>
              </div>
            </div>
          </div>

          <div class="section">
            <button type="button" class="collapsible btn btn-secondary btn-block text-left">Network Information</button>
            <div class="content" style="display: none;">
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="ip_address" class="form-label">IP Address</label>
                  <input type="text" class="form-control" id="ip_address" name="ip_address">
                </div>
                <div class="col-6 mb-3">
                  <label for="os" class="form-label">OS</label>
                  <input type="text" class="form-control" id="os" name="os">
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="remarks" class="form-label">Remarks</label>
                  <input type="text" class="form-control" id="remarks" name="remarks">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>








