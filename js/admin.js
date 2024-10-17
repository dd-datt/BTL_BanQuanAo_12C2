// app.js

// Hàm để hiển thị/ẩn submenu
function toggleSubmenu(menuId) {
    const menu = document.getElementById(menuId);
    if (menu) {
        menu.classList.toggle('hidden');
    }
}

// Hàm để chuyển đổi giữa các section
function showSection(sectionId) {
    const sections = document.querySelectorAll('#main-content section');
    sections.forEach(section => {
        section.classList.add('hidden');
        section.classList.remove('active');
    });

    const targetSection = document.getElementById(sectionId);
    if (targetSection) {
        targetSection.classList.remove('hidden');
        targetSection.classList.add('active');
    }
}

// Thêm sự kiện cho các liên kết trong sidebar để hiển thị section tương ứng
document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('#sidebar nav ul li a');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const sectionId = href.substring(1);
                showSection(sectionId);
            }
        });
    });

    // Hiển thị dashboard mặc định
    showSection('dashboard');
});
