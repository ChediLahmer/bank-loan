// Get all the name elements
const names = document.querySelectorAll('.form-name');

// Attach click event listener to each name element
names.forEach(name => {
  name.addEventListener('click', () => {
    // Get the form details element next to the clicked name
    const formDetails = name.nextElementSibling;

    // Toggle the visibility of the form details element
    formDetails.classList.toggle('hidden');
    formDetails.parentElement.classList.toggle('active');
  });
});
