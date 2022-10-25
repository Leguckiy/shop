    var form = document.getElementById('form-images');
    var buttonAddImage = document.getElementById('add-image');
    var imagesButtons = document.getElementsByClassName('delete-image');
    var arrayButtons = Object.values(imagesButtons);
    var arrayButtonsLength = arrayButtons.length;

    arrayButtons.forEach (btn => {
        btn.addEventListener('click', () => {
            if (arrayButtonsLength > 1) {
                btn.parentNode.remove();
                arrayButtonsLength--;
            }
        })
    });

    buttonAddImage.addEventListener('click', () => appendElement(form));

    function appendElement(el){
        var newImageField = el.firstElementChild.cloneNode(true);
        var deleteImageField = newImageField.lastElementChild;
        deleteImageField.addEventListener('click', () => removeImageField(newImageField));
        lastElement = el.lastElementChild;
        el.insertBefore(newImageField, lastElement);
        arrayButtonsLength++;
    }

    function removeImageField(ImageField) {
        if (arrayButtonsLength > 1) {
            ImageField.remove();
            arrayButtonsLength--;
        }
    }
