$(document).ready(function () {
    console.log("Initializing DataTable...");

    if (typeof DataTable === 'function') { // Ensure DataTables is loaded
        new DataTable('#myTable', {
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]], 
            paging: true,
            searching: true, // Disable the search bar
            ordering: true,
            order: [[0, "desc"]],
            columnDefs: [
                { orderable: false, targets: [ 10, 11] }
            ]
        });
    } else {
        console.error("DataTable is not loaded correctly.");
    }
});
