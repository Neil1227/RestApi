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

                let allData = response.data.sort((a, b) => {
                    if (a.updated_at && b.updated_at) {
                        return new Date(b.updated_at) - new Date(a.updated_at);
                    }
                    if (a.updated_at && !b.updated_at) return -1;
                    if (!a.updated_at && b.updated_at) return 1;
                    return new Date(b.created_at) - new Date(a.created_at);
                });


                // Build table rows with a hidden date column (for sorting)
                allData.forEach(pc => {
                    let timestamp = pc.updated_at || pc.created_at || '';
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
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="remarks-text">${pc.remarks || '-'}</span>
                                ${
                                pc.source_table === 'p1adminbldg'
                                    ? '<span class="badge ms-2" style="background-color: var(--p1-color); color: white;">Admin Bldg</span>'
                                    : pc.source_table === 'p1prod'
                                    ? '<span class="badge ms-2" style="background-color: var(--p1-color); color: white;">P1 Prod</span>'
                                    : pc.source_table === 'p1bldga'
                                    ? '<span class="badge ms-2" style="background-color: var(--p1-color); color: white;">P1 Bldg A</span>'
                                    : pc.source_table === 'p1whbldg'
                                    ? '<span class="badge ms-2" style="background-color: var(--p1-color); color: white;">P1 WH Bldg</span>'
                                    : pc.source_table === 'p2'
                                    ? '<span class="badge ms-2" style="background-color: var(--p2-color); color: white;">P2 Prod</span>'
                                    : pc.source_table === 'p3'
                                    ? '<span class="badge ms-2" style="background-color: var(--p3-color); color: white;">P3 Prod</span>'
                                    : pc.source_table === 'p5'
                                    ? '<span class="badge ms-2" style="background-color: var(--p5-color); color: white;">P5 Prod</span>'
                                    : pc.source_table === 'p6'
                                    ? '<span class="badge ms-2" style="background-color: var(--p6-color); color: white;">P6 Prod</span>'
                                    : '<span class="badge bg-secondary ms-2">Other</span>'
                                }
                            </div>
                        </td>
                        <td>
                            <span class="action-buttons-all">
                                <button class="btn btn-primary btn-sm open" data-table="${pc.source_table}">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                </button>
                                
                                <button class="btn btn-update btn-primary btn-sm btn-edit">
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
