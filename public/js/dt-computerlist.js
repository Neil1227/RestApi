$(document).ready(function () {
    console.log("Initializing DataTable...");

    if (typeof DataTable === 'function') { // Ensure DataTables is loaded
        new DataTable('#computerTable', {
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]], 
            paging: true,
            searching: false, // Disable the search bar
            ordering: true,
            order: [[0, "desc"]],
            columnDefs: [
                { orderable: true, targets: [0, 1,2,] }
            ]
        });
    } else {
        console.error("DataTable is not loaded correctly.");
    }
});
