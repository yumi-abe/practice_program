document.addEventListener('DOMContentLoaded', function() {
    const imagePath = document.getElementById('imagePath');
    const prevImage = document.getElementById('prevImage');
    const removeImage = document.getElementById('removeImage');

    imagePath.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                prevImage.src = e.target.result;
                prevImage.classList.remove('hidden');
                removeImage.classList.remove('hidden')
            }
            reader.readAsDataURL(file);
        }
    });

    removeImage.addEventListener('click', function() {
        prevImage.classList.add('hidden');
        removeImage.classList.add('hidden');
        imagePath.value = '';
    });
});






// function prevImage(event) {
//     const file = event.target.files[0];

//     if(file) {
//         const reader = new FileReader();

//         reader.onload = function(e) {
//             const prevImage = document.getElementById('prevImage');
//             prevImage.src = e.target.result;
//             prevImage.classList.remove('hidden');
//             prevImage.classList.add('block');
//         }
//     reader.readAsDataURL(file);
//     }

// }