document.addEventListener('DOMContentLoaded', function() {
    const whatsappButton = document.getElementById('whatsapp-button');
    const whatsappPopup = document.getElementById('whatsapp-popup');
    const closePopup = document.getElementById('close-popup');

    // Toggle popup visibility
    whatsappButton.addEventListener('click', function() {
        if (whatsappPopup.style.display === 'none' || whatsappPopup.style.display === '') {
            whatsappPopup.style.display = 'block';
        } else {
            whatsappPopup.style.display = 'none';
        }
    });

    // Close popup
    closePopup.addEventListener('click', function(e) {
        e.stopPropagation();
        whatsappPopup.style.display = 'none';
    });

    // Optional: Close popup if clicking outside (but within the widget container)
    // Removed to keep it simple and as per user request
    
    // Show popup after 3 seconds delay (initial appearance)
    setTimeout(function() {
        whatsappPopup.style.display = 'block';
    }, 3000);
});
