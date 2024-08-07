document.addEventListener('DOMContentLoaded', () => {
    fetchUserData();
    document.querySelector('.edit-button').addEventListener('click', () => {
        window.location.href = 'edit_profile.html';
    });
});

function fetchUserData() {
    fetch('get_user_data.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('name').innerText = data.name;
            document.getElementById('username').innerText = data.username;
            document.getElementById('email').innerText = data.email;
        })
        .catch(error => console.error('Error fetching user data:', error));
}


