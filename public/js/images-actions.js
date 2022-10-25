var form = document.getElementById('form-images');
var buttonAddImage = document.getElementById('add-image');
var imagesButtons = document.getElementsByClassName('delete-image');
var arrayButtons = Object.values(imagesButtons);

arrayButtons.forEach (btn => {
    btn.addEventListener('click', () => btn.parentNode.remove())
});

buttonAddImage.addEventListener('click', () => appendElement(form));

function appendElement(el){
    var newImageField = el.firstElementChild.cloneNode(true);
    var deleteImageField = newImageField.lastElementChild;
    deleteImageField.addEventListener('click', () => newImageField.remove());
    lastElement = el.lastElementChild;
    el.insertBefore(newImageField, lastElement);
} 
