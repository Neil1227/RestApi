document.addEventListener("DOMContentLoaded", function () {
    attachDeleteListenersToAllTables();
});

function attachDeleteListenersToAllTables() {
    document.body.addEventListener("click", function (event) {
        if (event.target.closest(".btn-danger")) {
            const button = event.target.closest(".btn-danger");
            const recordId = button.getAttribute("data-id");
            const tableName = button.getAttribute("data-table");

            if (!recordId || !tableName) return;

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/delete/${tableName}/${recordId}`)
                        .then((response) => {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Record has been deleted.",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Optional: Refresh the specific table
                            const tableElement = document.querySelector(`[data-table-id="${tableName}"]`);
                            if (tableElement) {
                                const apiUrl = tableElement.getAttribute("data-api-url");
                                if (apiUrl) {
                                    fetchData(tableElement.id, apiUrl, tableName); // assuming fetchData is global
                                }
                            }
                        })
                        .catch((error) => {
                            Swal.fire("Error!", "Something went wrong.", "error");
                            console.error("Delete error:", error);
                        });
                }
            });
        }
    });
}
