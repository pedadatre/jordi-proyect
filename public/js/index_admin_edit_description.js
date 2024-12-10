document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button');
    const saveButtons = document.querySelectorAll('.save-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const crewId = this.getAttribute('data-id');
            const descriptionText = document.getElementById(`description-text-${crewId}`);
            const descriptionEdit = document.getElementById(`description-edit-${crewId}`);
            const saveButton = document.querySelector(`.save-button[data-id="${crewId}"]`);

            // Toggle visibility
            descriptionText.classList.add('d-none');
            descriptionEdit.classList.remove('d-none');
            saveButton.classList.remove('d-none');
            this.classList.add('d-none');
        });
    });

    saveButtons.forEach(button => {
        button.addEventListener('click', function () {
            const crewId = this.getAttribute('data-id');
            const descriptionEdit = document.getElementById(`description-edit-${crewId}`);
            const descriptionText = document.getElementById(`description-text-${crewId}`);
            const editButton = document.querySelector(`.edit-button[data-id="${crewId}"]`);

            // Send AJAX request to update description
            fetch(`/admin/crews/update-description/${crewId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    description: descriptionEdit.value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the description text
                    descriptionText.textContent = descriptionEdit.value;

                    // Toggle visibility
                    descriptionText.classList.remove('d-none');
                    descriptionEdit.classList.add('d-none');
                    saveButton.classList.add('d-none');
                    editButton.classList.remove('d-none');
                } else {
                    alert('Failed to update description');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update description');
            });
        });
    });
});