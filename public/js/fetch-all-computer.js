document.addEventListener("DOMContentLoaded", function () {
    function fetchAllComputersData() {
        axios.get("/get-all-computers")
            .then(response => {
                let tableBody = document.querySelector("#allListTable tbody");
                tableBody.innerHTML = ''; // Clear existing rows

                if (!response.data || response.data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="13" class="text-center">No data available</td></tr>`;
                    return;
                }

                // Sort data by created_at or updated_at (most recent first)
                let allData = response.data.sort((a, b) => {
                    let aDate = new Date(a.created_at || a.updated_at);
                    let bDate = new Date(b.created_at || b.updated_at);
                    return bDate - aDate;
                });

                // Build table rows with a hidden date column (for sorting)
                allData.forEach(pc => {
                    let timestamp = pc.created_at || pc.updated_at || '';
                    console.log("source_table:", pc.source_table);
            let row = `<tr data-id="${pc.id}" data-table="${pc.source_table}">
                        <td style="display:none">${timestamp}</td> <!-- Hidden date column -->
                        <td style="display:none">${pc.id}</td>
                        <td>${pc.department || '-'}</td>
                        <td>${pc.username || '-'}</td>
                        <td>${pc.computer_name || '-'}</td>
                        <td>${pc.model || '-'}</td>
                        <td>${pc.pc_grade || '-'}</td>
                        <td>${pc.processor || '-'}</td>
                        <td>${pc.ram || '-'}</td>
                        <td>${pc.storage || '-'}</td>
                        <td>${pc.ip_address || '-'}</td>
                        <td>${pc.os || '-'}</td>
                        <td>${pc.remarks || '-'}</td>
                        <td>
                            <span class="action-buttons-all">
                                <button class="btn btn-primary btn-sm open" data-table="${pc.source_table}">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                </button>
                                
                                <button class="btn btn-primary btn-sm btn-edit">
                                    <i class="fas fa-pencil"></i>
                                </button>

                                
                                <button class="btn btn-delete-all btn-danger btn-sm" data-id="${pc.id}" data-table="${pc.source_table}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </span>
                        </td>
                    </tr>`;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });

                // Reinitialize DataTable with sort by hidden column (index 0)
                reinitializeDataTable("allListTable");

            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });
    }

    function reinitializeDataTable(tableId) {
        if ($.fn.DataTable.isDataTable(`#${tableId}`)) {
            $(`#${tableId}`).DataTable().destroy();
        }

        $(`#${tableId}`).DataTable({
            responsive: true,
            pageLength: 15,
            searching: true,
            lengthMenu: [15, 25, 50, 100],
            order: [[0, 'desc']], // Sort by the hidden timestamp column
            columnDefs: [
                { targets: [0, 1], visible: false }, // timestamp, ID
                { orderable: false, targets: [13] } // actions column index
            ],
            
            language: {
                lengthMenu: "Entries _MENU_",
                emptyTable: "No data available",
                searchPlaceholder: "Search records..."
            }
        });
    }

    fetchAllComputersData();
});
