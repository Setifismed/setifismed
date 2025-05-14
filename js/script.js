// Toggle password visibility
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

if (togglePassword) {
    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
}

// Company logo upload functionality
const uploadLogo = document.querySelector('#uploadLogo');
const companyLogo = document.querySelector('#companyLogo');

if (uploadLogo) {
    uploadLogo.addEventListener('click', function(e) {
        e.preventDefault();
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';

        input.onchange = (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    companyLogo.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        };

        input.click();
    });
}

// Login form submission
const loginForm = document.querySelector('#loginForm');

if (loginForm) {
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;

        // Simple validation
        if (email && password) {
            // Redirect to dashboard
            window.location.href = "dashboard.html";
        } else {
            alert('Please enter both email and password');
        }
    });
}

// File upload functionality
const uploadArea = document.querySelector('#uploadArea');

if (uploadArea) {
    uploadArea.addEventListener('click', function() {
        const input = document.createElement('input');
        input.type = 'file';
        input.multiple = true;

        input.onchange = (event) => {
            const files = event.target.files;
            if (files.length > 0) {
                alert(`Successfully selected ${files.length} file(s)`);
            }
        };

        input.click();
    });

    // Drag and drop functionality
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color');
        uploadArea.style.backgroundColor = 'rgba(67, 97, 238, 0.1)';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = '#dee2e6';
        uploadArea.style.backgroundColor = 'transparent';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#dee2e6';
        uploadArea.style.backgroundColor = 'transparent';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            alert(`Successfully dropped ${files.length} file(s)`);
            // Handle file upload here
        }
    });
}

// Profile form submission
const profileForm = document.querySelector('#profileForm');

if (profileForm) {
    profileForm.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Profile updated successfully!');
    });
}

// Settings form submission
const settingsForm = document.querySelector('#settingsForm');

if (settingsForm) {
    settingsForm.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Settings saved successfully!');
    });
}
