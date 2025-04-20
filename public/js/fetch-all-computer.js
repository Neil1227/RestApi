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
                allData.forEach(computer => {
                    let timestamp = computer.created_at || computer.updated_at || '';
                    console.log("source_table:", computer.source_table);
            let row = `<tr data-id="${computer.id}" data-table="${computer.source_table}">
                        <td style="display:none">${timestamp}</td> <!-- Hidden date column -->
                        <td style="display:none">${computer.id}</td>
                        <td>${computer.department || '-'}</td>
                        <td>${computer.username || '-'}</td>
                        <td>${computer.computer_name || '-'}</td>
                        <td>${computer.model || '-'}</td>
                        <td>${computer.pc_grade || '-'}</td>
                        <td>${computer.processor || '-'}</td>
                        <td>${computer.ram || '-'}</td>
                        <td>${computer.storage || '-'}</td>
                        <td>${computer.ip_address || '-'}</td>
                        <td>${computer.os || '-'}</td>
                        <td>${computer.remarks || '-'}</td>
                        <td>
                            <span class="action-buttons-all">
                                <button class="btn btn-primary btn-sm open" data-table="${computer.source_table}">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                </button>
                                
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil"></i>
                                </button>
                                
                                <button class="btn btn-danger btn-sm" data-id="${computer.id}" data-table="${computer.source_table}">
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
