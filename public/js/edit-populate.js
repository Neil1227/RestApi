document.addEventListener("click", function (e) {
    if (e.target.closest(".btn-edit")) {
        const row = e.target.closest("tr");

        const data = {
            id: row.getAttribute("data-id"),
            table: row.getAttribute("data-table"),
            department: row.children[0].textContent.trim(),
            username: row.children[1].textContent.trim(),
            computer_name: row.children[2].textContent.trim(),
            model: row.children[3].textContent.trim(),
            pc_grade: row.children[4].textContent.trim(),
            processor: row.children[5].textContent.trim(),
            ram: row.children[6].textContent.trim(),
            storage: row.children[7].textContent.trim(),
            ip_address: row.children[8].textContent.trim(),
            os: row.children[9].textContent.trim(),
            remarks: row.children[10].textContent.trim(),
        };

        // Populate modal form fields
        document.getElementById("editId").value = data.id;
        document.getElementById("editTable").value = data.table;
        document.getElementById("editDepartment").value = data.department;
        document.getElementById("editUsername").value = data.username;
        document.getElementById("editComputerName").value = data.computer_name;
        document.getElementById("editModel").value = data.model;
        document.getElementById("editPCGrade").value = data.pc_grade;
        document.getElementById("editProcessor").value = data.processor;
        document.getElementById("editRAM").value = data.ram;
        document.getElementById("editStorage").value = data.storage;
        document.getElementById("editIPAddress").value = data.ip_address;
        document.getElementById("editOS").value = data.os;
        document.getElementById("editRemarks").value = data.remarks;

        // Show modal
        const editModal = new bootstrap.Modal(document.getElementById("editComputerModal"));
        editModal.show();
    }
});
