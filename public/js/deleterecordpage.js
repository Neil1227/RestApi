// public/js/delete-individual.js

document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener("click", function (e) {
        const deleteBtn = e.target.closest(".btn-danger[data-id]");

        if (deleteBtn) {
            const deleteId = deleteBtn.getAttribute("data-id");
            const tableName = deleteBtn.getAttribute("data-table");

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
                    console.log("Deleting ID:", deleteId, "From table:", tableName);

                    axios.post("/delete-individual", {
                        id: deleteId,
                        table: tableName
                    })
                    .then(response => {
                        if (response.data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'The record has been deleted.',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed!',
                                text: response.data.message || 'Something went wrong.'
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Delete error:", error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while deleting.'
                        });
                    });
                }
            });
        }
    });
});
