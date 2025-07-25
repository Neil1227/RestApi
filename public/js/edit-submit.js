document.getElementById("editComputerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Debug log for form data
    console.log("Form Data Submitted:", Object.fromEntries(formData.entries()));

    axios.post("/update-computer", formData)
        .then(response => {
            const res = response.data;

            console.log("Axios Response:", response); // Debug output

            if (res && res.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Updated Successfully!',
                    text: res.message || 'The record has been updated.',
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true
                }).then(() => {
                    window.location.reload();
                });
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Update Failed',
                    text: res?.message || 'Unexpected response from the server.'
                });
            }
        })
        .catch(error => {
            const message =
                error?.response?.data?.message ||
                error?.message ||
                'An unexpected error occurred during update.';

            console.error("Axios Error:", error); // Debug output

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: message
            });
        });
});
document.getElementById('factory-edit').addEventListener('change', function () {
    const newFactory = this.value;
    const factoryLabel = this.options[this.selectedIndex].text;

Swal.fire({
    title: 'Move record?',
    text: 'Are you sure you want to move this record to "' + factoryLabel + '"?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, move it!'
}).then((result) => {
    if (!result.isConfirmed) {
        // Cancelled, revert the dropdown
        this.value = document.getElementById('editTable').value;
    }
});

});
