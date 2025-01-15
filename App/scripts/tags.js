document.getElementById('add-tag').addEventListener('click', function() {
    const tagSelect = document.getElementById('tags');
    const selectedTagId = tagSelect.value;
    const selectedTagName = tagSelect.options[tagSelect.selectedIndex].text;

    if (selectedTagId && selectedTagName) {
        const tagContainer = document.getElementById('tags-container');
        const tagButton = document.createElement('button');
        tagButton.textContent = selectedTagName;
        tagButton.setAttribute('data-tag-id', selectedTagId);
        tagButton.classList.add('tag-button', 'bg-blue-600', 'text-white', 'px-4', 'py-2', 'rounded-lg', 'mr-2', 'mt-2');
        
        const removeButton = document.createElement('span');
        removeButton.textContent = ' X';
        removeButton.classList.add('text-red-500', 'cursor-pointer');
        removeButton.addEventListener('click', function() {
            tagContainer.removeChild(tagButton);
        });
        
        tagButton.appendChild(removeButton);
        tagContainer.appendChild(tagButton);
        
        tagSelect.value = '';
    }
});
