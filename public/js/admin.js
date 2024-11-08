const addCategoryForm = document.querySelector('.categoryForm.add');
const editCategoryForm = document.querySelector('.categoryForm.edit');

const editBtns = document.querySelectorAll('.editBtn');
const addBtn = document.querySelector('.addBtn');

addBtn.addEventListener('click' , () => {
    if (editCategoryForm != null) {
        editCategoryForm.style.display = 'none';
    }
    addCategoryForm.style.display = 'flex';
})

// editBtns.forEach(editBtn => {
    
//     editBtn.addEventListener('click' , () => {
//         addCategoryForm.style.display = 'none';
//         editCategoryForm.style.display = 'flex';
    
//         editCategoryForm.action = editCategoryForm.action.slice(0,-1) + editBtn.parentElement.parentElement.firstElementChild.textContent;
    
//         editCategoryForm.querySelector('input').value = editBtn.parentElement.parentElement.querySelector('.category_name').textContent
    
//     })
// })

