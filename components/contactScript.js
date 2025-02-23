document.addEventListener("DOMContentLoaded", function () {
    let contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            let name = document.getElementById('name').value.trim();
            let email = document.getElementById('email').value.trim();
            let phone = document.getElementById('phone').value.trim();
            let message = document.getElementById('message').value.trim();
            let honeypot = document.getElementById('honeypot').value;

            if (honeypot !== "") {
                alert("Spam detected!");
                return;
            }

            if (name === "" || email === "" || phone === "" || message === "") {
                alert("All fields are required!");
                return;
            }

            if (!/^\S+@\S+\.\S+$/.test(email)) {
                alert("Invalid email format!");
                return;
            }

            if (!/^\d{10}$/.test(phone)) {
                alert("Invalid phone number! Enter a 10-digit number.");
                return;
            }

            // Send data using AJAX (Fetch API)
            let formData = new FormData(contactForm);

            fetch('../components/contacts.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Expecting JSON response from PHP
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    contactForm.reset(); // Clear the form after success
                } else {
                    alert(data.message); // Display the error message from PHP
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("❌ An error occurred. Please try again.");
            });
        });
    }
});
