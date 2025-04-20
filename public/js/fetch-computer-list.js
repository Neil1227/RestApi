document.addEventListener("DOMContentLoaded", function () {
    // Function to fetch and populate a specific table
    function fetchComputerListData(apiUrl) {
        axios.get(apiUrl)
            .then(function(response) {
                console.log("Computer List API Response:", response.data);

                let tableBody = document.querySelector("#computerTable tbody");
                tableBody.innerHTML = ''; // Clear existing rows

                // Check if data exists
                if (!response.data || response.data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="3" class="text-center">No data available</td></tr>`;
                    return;
                }

               // Dynamically generate table rows
                response.data.forEach(function(computer) {
                    let row = `<tr>
                        <td>
                            <span class="cell-text">${computer.superl_philippines_inc || '-'}</span>
                            <span class="action-buttons">
                                <button class="btn btn-success btn-sm edit-btn" data-id="${computer.id}" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${computer.id}" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </span>
                        </td>
                        <td>
                            <span class="cell-text">${computer.siglo_leatherware || '-'}</span>
                            <span class="action-buttons">
                                <button class="btn btn-success btn-sm edit-btn" data-id="${computer.id}" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${computer.id}" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </span>
                        </td>
                        <td>
                            <span class="cell-text">${computer.angeles_alliance_leatherware || '-'}</span>
                            <span class="action-buttons">
                                <button class="btn btn-success btn-sm edit-btn" data-id="${computer.id}" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${computer.id}" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </span>
                        </td>
                    </tr>`;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });

                // Attach event listeners for Edit and Delete buttons
                attachEventListeners();

                // Re-initialize DataTable after the data is loaded
                reinitializeDataTable("computerTable");
            })
            .catch(function(error) {
                console.error("Error fetching computer list data:", error);
            });
    }

    // Function to reinitialize DataTables
    function reinitializeDataTable(tableId) {
        if (!$.fn.DataTable.isDataTable(`#${tableId}`)) {
            $(`#${tableId}`).DataTable({
                responsive: true,
                pageLength: 15,
                searching: true,
                lengthMenu: [15, 25, 50, 100],
                language: {
                    lengthMenu: "Entries _MENU_",
                    emptyTable: "No data available in table",
                    searchPlaceholder: "Search records..."
                }
            });
        }
    }

    // Function to attach event listeners for action buttons
    function attachEventListeners() {
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function () {
                let id = this.getAttribute("data-id");
                alert(`Edit item with ID: ${id}`);
                // Replace alert with actual edit functionality
            });
        });

        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function () {
                let id = this.getAttribute("data-id");
                let confirmDelete = confirm(`Are you sure you want to delete item with ID: ${id}?`);
                if (confirmDelete) {
                    alert(`Deleted item with ID: ${id}`);
                    // Replace alert with actual delete functionality
                }
            });
        });
    }

    // Fetch data for the computer list table
    fetchComputerListData("/get-computer-data");
});
