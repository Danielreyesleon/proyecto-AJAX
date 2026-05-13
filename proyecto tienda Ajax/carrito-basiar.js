$.ajax({
    url: 'borrar.php',
    type: 'POST',
    data:{ action: 'clear_session' },
    dataType: 'json',
    success: function(response) {
        if (response.status === 'success') {
            console.log("Session variable cleared.");
        }
    },
    error: function() {
        console.log("Error clearing session variable.");
    }
    
});