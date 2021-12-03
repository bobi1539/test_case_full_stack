const flashDataSuccess = document.getElementById('flash-data-success');

if (flashDataSuccess){
    if (flashDataSuccess.getAttribute('data-flashdata')){
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: flashDataSuccess.getAttribute('data-flashdata'),
        }); 
    }
}

const flashDataError = document.getElementById('flash-data-error');

if (flashDataError){
    if (flashDataError.getAttribute('data-flashdata')){
        Swal.fire({
            icon: 'error',
            title: 'Opps..',
            text: flashDataError.getAttribute('data-flashdata'),
        }); 
    }
}

// hide trix upload
document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
});

// preview image

function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
