import { fetchData } from './fetch-data.js';

function attachDeleteListeners(tableId, apiUrl, dbTable) {
    const deleteTable = document.querySelector(`#${tableId}`);
    const deleteTableBody = deleteTable.querySelector("tbody");

    deleteTableBody.querySelectorAll(".btn-danger").forEach(deleteBtn => {
        deleteBtn.addEventListener("click", function () {
            const recordIdToDelete = this.getAttribute("data-id");
            const sourceTableName = this.getAttribute("data-table");
            console.log("Attempting delete:", { id: recordId, table: tableSource });
//_____________________________________________________________create a new /combine controller.
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.isConfirmed) {
                    // Debug log
                    console.log("Deleting ID:", recordIdToDelete, "from table:", sourceTableName);

                    axios.post("/delete-individual", {
                        id: recordIdToDelete,
                        table: sourceTableName
                    })
                    .then(response => {
                        if (response.data.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'The record has been deleted.',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                fetchData(tableId, apiUrl, dbTable); // Refresh current table only
                            });
                        } else {
                            console.error("Delete failed response:", response.data);
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed!',
                                text: response.data.message || 'Something went wrong.'
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Axios delete error:", error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while deleting.'
                        });
                    });
                }
            });
        });
    });
}

export { attachDeleteListeners };
