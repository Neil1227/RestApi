<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editable Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Computer List</h2>
    <table class="table table-bordered" id="allListTable">
        <thead>
            <tr>
                <th style="display:none">Timestamp</th>
                <th style="display:none">ID</th>
                <th>Department</th>
                <th>Username</th>
                <th>Computer Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr data-id="1" data-table="sample_table">
                <td style="display:none">2024-05-01</td>
                <td style="display:none">1</td>
                <td>IT</td>
                <td>jdoe</td>
                <td>PC-001</td>
                <td>
                    <button class="btn btn-primary btn-sm btn-edit">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editComputerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Computer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="editId">
        <input type="hidden" id="editTable">

        <div class="mb-3">
          <label for="editDepartment" class="form-label">Department</label>
          <input type="text" class="form-control" id="editDepartment">
        </div>

        <div class="mb-3">
          <label for="editUsername" class="form-label">Username</label>
          <input type="text" class="form-control" id="editUsername">
        </div>

        <div class="mb-3">
          <label for="editComputerName" class="form-label">Computer Name</label>
          <input type="text" class="form-control" id="editComputerName">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
document.addEventListener("click", function (e) {
    if (e.target.closest(".btn-edit")) {
        const row = e.target.closest("tr");

        // Extract data from table row
        const data = {
            id: row.getAttribute("data-id"),
            table: row.getAttribute("data-table"),
            department: row.children[2].textContent.trim(),
            username: row.children[3].textContent.trim(),
            computer_name: row.children[4].textContent.trim(),
        };

        // Populate modal fields
        document.getElementById("editId").value = data.id;
        document.getElementById("editTable").value = data.table;
        document.getElementById("editDepartment").value = data.department;
        document.getElementById("editUsername").value = data.username;
        document.getElementById("editComputerName").value = data.computer_name;

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById("editComputerModal"));
        modal.show();
    }
});
</script>

</body>
</html>
