 function validateForm(event) {
            event.preventDefault();

            const firstname = document.getElementById('firstname').value.trim();
            const lastname = document.getElementById('lastname').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const gender = document.querySelector('input[name="gender"]:checked');

            // Reset error messages
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');

            // Validation checks
            if (!firstname || !lastname) {
                alert('❌ First name and last name are required!');
                return false;
            }

            if (firstname.length < 2) {
                alert('❌ First name must be at least 2 characters!');
                return false;
            }

            if (!email) {
                alert('❌ Email is required!');
                return false;
            }

            if (!email.includes('@')) {
                alert('❌ Please enter a valid email address!');
                return false;
            }

            if (!password) {
                alert('❌ Password is required!');
                return false;
            }

            if (password.length < 6) {
                alert('❌ Password must be at least 6 characters long!');
                return false;
            }

            if (!gender) {
                alert('❌ Please select a gender!');
                return false;
            }

            // All validations passed, submit the form
            document.getElementById('signupForm').submit();
        }