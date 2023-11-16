<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add your styles or link to a stylesheet here -->
</head>
<body>
    <div>
        <h2>Welcome to the Dashboard</h2>
        <p>This is your secure dashboard content.</p>
        <button onclick="logout()">Logout</button>
    </div>

    <script>
        function logout() {
            var token = localStorage.getItem('access_token');

            fetch('http://localhost:8000/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Successfully logged out') {
                    // Clear the token and redirect to the login page
                    localStorage.removeItem('access_token');
                    window.location.href = '/';
                } else {
                    console.error('Logout failed:', data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
