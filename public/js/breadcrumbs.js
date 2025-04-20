document.addEventListener("DOMContentLoaded", function () {
    const breadcrumbItems = document.querySelectorAll(".breadcrumb li a");

    // Get the current page path (no trailing slashes or query)
    const currentPath = window.location.pathname.replace(/\/+$/, "");

    breadcrumbItems.forEach(link => {
        // Get href and normalize it
        let href = link.getAttribute("href") || "";

        // Convert full URLs to just pathname
        const linkPath = new URL(href, window.location.origin).pathname.replace(/\/+$/, "");

        // Compare paths
        if (currentPath === linkPath) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });

    // On breadcrumb click
    breadcrumbItems.forEach(link => {
        link.addEventListener("click", function () {
            breadcrumbItems.forEach(item => item.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
