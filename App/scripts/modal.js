document.addEventListener("DOMContentLoaded", function() {
    const openModalButtons = document.querySelectorAll('.open-modal');
    const modal = document.getElementById('course-modal');
    const closeModalButton = document.getElementById('close-modal');
    const modalCloseIcon = document.getElementById('modal-close-icon');
  
    // Open modal and populate the data from the course button
    openModalButtons.forEach(button => {
      button.addEventListener('click', function() {
        const courseId = this.getAttribute('data-course-id');
        const courseTitle = this.getAttribute('data-course-title');
        const courseDescription = this.getAttribute('data-course-description');
        const courseContent = this.getAttribute('data-course-content');
        const courseCategory = this.getAttribute('data-course-category');
        const courseTags = this.getAttribute('data-course-tags').split(',');
  
        document.getElementById('course-title-input').value = courseTitle;
        document.getElementById('course-description-input').value = courseDescription;
        document.getElementById('course-content-input').value = courseContent;
        document.getElementById('course-id-input').value = courseId;
  
        document.getElementById('category-select').value = courseCategory;
  
        document.querySelectorAll('.tag-checkbox').forEach(checkbox => {
          checkbox.checked = courseTags.includes(checkbox.value);
        });
  
        modal.classList.remove('hidden');
      });
    });
  
    // Close modal when clicking on the close button or icon
    closeModalButton.addEventListener('click', function() {
      modal.classList.add('hidden');
    });
  
    // Close modal when clicking outside the modal content
    modal.addEventListener('click', function(event) {
      if (event.target === modal) {
        modal.classList.add('hidden');
      }
    });
  
    // Close modal using the close icon (X)
    modalCloseIcon.addEventListener('click', function() {
      modal.classList.add('hidden');
    });
  });
  