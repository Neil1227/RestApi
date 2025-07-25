document.addEventListener("DOMContentLoaded", function () {
    // Collapsible logic
    const collapsibles = document.querySelectorAll(".collapsible");
    collapsibles.forEach(button => {
      button.addEventListener("click", function () {
        this.classList.toggle("active");
        const content = this.nextElementSibling;
        content.style.display = content.style.display === "block" ? "none" : "block";
      });
    });
  
    // Form submission logic
    let isSubmitting = false;
    const form = document.getElementById("addRecordForm");
  
    form.addEventListener("submit", function (e) {
      e.preventDefault();
  
      if (isSubmitting) return;
      isSubmitting = true;
  
      const formData = new FormData(form);
      const selectedTable = document.getElementById("factory").value;
  
      if (!selectedTable) {
        Swal.fire({
          icon: 'warning',
          title: 'Missing Table',
          text: 'Please select a table first!'
        });
        isSubmitting = false;
        return;
      }
  
      formData.delete("factory");
      formData.append("table", selectedTable);
  
      fetch("/insert-record", {
        method: "POST",
        body: formData,
        headers: {
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        }
      })
      .then(response => response.json())
      .then(data => {
        isSubmitting = false;
        if (data.success) {
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: 'Record inserted successfully!',
              timer: 2000,
              showConfirmButton: false,
              timerProgressBar: true

            }).then(() => {
              // Redirect based on selectedTable
              window.location.href = `/${selectedTable}`; // Assuming your route is like "/p1", "/p2", etc.
            });
          
            $('#addRecordModal').modal('hide');
            form.reset();
          }
           else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.error || 'Unknown error occurred'
          });
        }
      })
      .catch(error => {
        isSubmitting = false;
        console.error("Error inserting record:", error);
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'An error occurred while inserting the record.'
        });
      });
    });
  });
  