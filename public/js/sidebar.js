document.getElementById('sidebarToggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    // Toggle sidebar visibility and overlay
    sidebar.classList.toggle('sidebar-expanded');
    overlay.classList.toggle('overlay-active');
});

// Close sidebar if overlay is clicked
document.getElementById('overlay').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.remove('sidebar-expanded');
    overlay.classList.remove('overlay-active');
});

// Close sidebar when close button is clicked
document.getElementById('closeSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.remove('sidebar-expanded');
    overlay.classList.remove('overlay-active');
});
