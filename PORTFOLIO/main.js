// Function to handle form submission
function handleSubmit(event) {
    event.preventDefault(); // Prevent the default form submission
    
    // Retrieve form data
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    
    // Perform validation (e.g., check if required fields are filled)
    // Implement your validation logic here
    
    // Example: Display an alert with the form data
    alert("Name: " + name + "\nEmail: " + email + "\nSubject: " + subject + "\nMessage: " + message);
  }
  
  // Add event listener to the form's submit event
  document.getElementById("contactForm").addEventListener("submit", handleSubmit);
  