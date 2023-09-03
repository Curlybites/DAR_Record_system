

new DataTable('#example', {
    order: [[0, 'desc']]
});


    document.addEventListener("DOMContentLoaded", function() {
        // Get the current date in YYYY-MM-DD format
        const currentDate = new Date().toISOString().split("T")[0];
        
        // Set the current date as the value of the input element
        document.getElementById("dateInput").value = currentDate;
      });
    
    
      var currentTime = new Date();
    
      // Format the time as HH:MM
      var formattedTime = currentTime.getHours().toString().padStart(2, '0') + ':' +
        currentTime.getMinutes().toString().padStart(2, '0');
    
      // Set the time value in the input field
      document.getElementById('timeInput').value = formattedTime;
      
      

    document.addEventListener("DOMContentLoaded", function() {
      // Get the current date in YYYY-MM-DD format
      const currentDate = new Date().toISOString().split("T")[0];
      
      // Set the current date as the value of the input element
      document.getElementById("date").value = currentDate;
    });
  
  
    var currentTime = new Date();
  
    // Format the time as HH:MM
    var formattedTime = currentTime.getHours().toString().padStart(2, '0') + ':' +
      currentTime.getMinutes().toString().padStart(2, '0');
  
    // Set the time value in the input field
    document.getElementById('time').value = formattedTime;