
document.addEventListener("DOMContentLoaded", function () {
    // ✅ Table configuration: tableId -> { apiUrl, dbTable }
    let tables = {
        "p1prodTable": { apiUrl: "/get-p1prod-data", dbTable: "p1prod" },
        "p1adminbldgTable": { apiUrl: "/get-p1adminbldg-data", dbTable: "p1adminbldg" },
        "p1bldgaTable": { apiUrl: "/get-p1bldga-data", dbTable: "p1bldga" },
        "p1whBldgTable": { apiUrl: "/get-p1whbldg-data", dbTable: "p1whbldg" },
        "p2Table": { apiUrl: "/get-p2-data", dbTable: "p2" },
        "p3Table": { apiUrl: "/get-p3-data", dbTable: "p3" },
        "p5Table": { apiUrl: "/get-p5-data", dbTable: "p5" },
        "p6Table": { apiUrl: "/get-p6-data", dbTable: "p6" }
    };

    // ✅ Fetch and display table data
    function fetchData(tableId, apiUrl, dbTable, columnCount = 12) {
        axios.get(apiUrl)
            .then(function (response) {
                let table = document.querySelector(`#${tableId}`);
                let tableBody = table.querySelector("tbody");
                tableBody.innerHTML = ''; // Clear old rows

                if (!response.data || response.data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="${columnCount}" class="text-center">No data available</td></tr>`;
                    return;
                }

                // Sort data by latest
                response.data.sort((a, b) => {
                    let dateA = new Date(a.created_at || a.updated_at);
                    let dateB = new Date(b.created_at || b.updated_at);
                    return dateB - dateA;
                });

                // ✅ Build table rows
                response.data.forEach(function (computer) {
                    let row = `
                        <tr>
                            <td style="display:none">${computer.created_at || computer.updated_at}</td>
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
                                    <button class="btn btn-edit btn-primary btn-sm"><i class="fas fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $computer->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                </span>
                            </td>
                        </tr>`;
                    tableBody.insertAdjacentHTML("beforeend", row);
                });
                

                reinitializeDataTable(tableId);
                attachDeleteListeners(tableId, apiUrl, dbTable); // 🔁 add listeners
            })
            .catch(function (error) {
                console.error(`Error loading data for ${tableId}:`, error);
            });
    }

    // ✅ Reinitialize DataTable
    function reinitializeDataTable(tableId) {
        if ($.fn.DataTable.isDataTable(`#${tableId}`)) {
            $(`#${tableId}`).DataTable().destroy();
        }
        $(`#${tableId}`).DataTable({
            responsive: true,
            pageLength: 15,
            searching: true,
            lengthMenu: [15, 25, 50, 100],
            order: [[0, 'desc']],
            columnDefs: [
                { targets: [0, 1], visible: false },
                { orderable: false, targets: [13] }
            ],
            language: {
                lengthMenu: "Entries _MENU_",
                emptyTable: "No data available in table",
                searchPlaceholder: "Search records..."
            }
        });
    }
    // ✅ Initialize all tables
    for (const [tableId, { apiUrl, dbTable }] of Object.entries(tables)) {
        fetchData(tableId, apiUrl, dbTable);
    }

    
});
