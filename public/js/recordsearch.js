document.addEventListener("click", function (event) {
    if (event.target.closest(".open")) {
        const button = event.target.closest(".open");
        const table = button.getAttribute("data-table");

        const tableRoutes = {
            "p1adminbldg": "/p1adminbldg",
            "p1whbldg": "/p1whBldg",
            "p1prod": "/p1prod",
            "p1bldga": "/p1bldga",
            "p2": "/p2",
            "p3": "/p3",
            "p5": "/p5",
            "p6": "/p6"
        };

        if (table && tableRoutes[table]) {
            window.location.href = tableRoutes[table];
        } else {
            alert("No matching page found for this record.");
        }
    }
});
