document.getElementById("editComputerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    console.log("Sending data:", data); // Debugging

    axios.post("/update-computer", data)
        .then(res => {
            console.log("Server response:", res.data);

            if (res.data.success === true || res.data.success === "true") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: res.data.message || "Computer record updated successfully.",
                    timer: 2000,
                    showConfirmButton: false
                });

                $('#editComputerModal').modal('hide');
                fetchAllComputersData();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed",
                    text: res.data.message || "Update failed. Please try again."
                });
            }
        })
        .catch(err => {
            console.error("Update failed:", err.response?.data || err.message || err);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: err.response?.data?.message || "An error occurred while updating the record."
            });
        });
});
