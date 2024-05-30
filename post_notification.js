document.getElementById('postNotificationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const formData = new FormData(this);

    fetch('submit_notification.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            // Redirect to a thank you page
            window.location.href = 'thank_you_notification.html';
        } else {
            throw new Error('Failed to post notification');
        }
    })
    .catch(error => console.error('Error posting notification:', error));
});
