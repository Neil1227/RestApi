document.getElementById("confirmDeleteBtn").addEventListener("click", () => {
    axios.post("/delete", {
        id: deleteId,
        table: deleteTable
    })
    .then(response => {
        if (response.data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'The record has been successfully deleted.',
                timer: 1500,
                showConfirmButton: false,
                didClose: () => {
                    // Reload page once the alert closes
                    location.href = location.href;
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Delete Failed',
                text: response.data.message
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
});
