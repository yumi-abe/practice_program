document.addEventListener('DOMContentLoaded', function() {
    const imagePath = document.getElementById('imagePath');
    const prevImage = document.getElementById('prevImage');
    const removeImage = document.getElementById('removeImage');

    //ファイルを添付したらプレビューを表示する
    imagePath.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                prevImage.src = e.target.result;
                prevImage.classList.remove('hidden');
                removeImage.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    //添付削除ボタン
    removeImage.addEventListener('click', function() {
        prevImage.classList.add('hidden');
        removeImage.classList.add('hidden');
        imagePath.value = '';
        prevImage.src = '';
    });

    //既に添付されている（編集画面）場合はプレビューを表示しておく
    if (prevImage.src && prevImage.src !== window.location.href) {
        prevImage.classList.remove('hidden');
        removeImage.classList.remove('hidden');
    }
});

