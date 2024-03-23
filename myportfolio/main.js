
    // Submit btn
function handleSubmit(event) {
    event.preventDefault(); 
    
    
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    
    
    
    alert("Name: " + name + "\nEmail: " + email + "\nSubject: " + subject + "\nMessage: " + message);
  }
  

  // Navbar
  {
  document.getElementById("contactForm").addEventListener("submit", handleSubmit);

  
document.getElementById('navbarToggleBtn').addEventListener('click', function() {

    var navbarCollapse = document.getElementById('navbarNav');
    navbarCollapse.classList.toggle('show');
  });
  
}