document.addEventListener('DOMContentLoaded', function() {
    const imagePath = document.getElementById('imagePath');
    const prevImage = document.getElementById('prevImage');
    const removeImage = document.getElementById('removeImage');

    // ファイルが選択されたときにプレビュー表示
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

    // 画像削除ボタンの動作（フォーム送信せずに画像削除のみを行う）
    removeImage.addEventListener('click', function() {
        prevImage.classList.add('hidden');
        removeImage.classList.add('hidden');
        imagePath.value = '';  // ファイルフィールドをクリア
        prevImage.src = '';  // プレビューをクリア

        // 削除の意図をサーバーに伝えるためにhiddenフィールドを使う
        const removeImageField = document.createElement('input');
        removeImageField.type = 'hidden';
        removeImageField.name = 'remove_image';
        removeImageField.value = '1';
        removeImage.appendChild(removeImageField);
    });

    // 既に画像がある場合はプレビューを表示
    if (prevImage.src && prevImage.src !== window.location.href) {
        prevImage.classList.remove('hidden');
        removeImage.classList.remove('hidden');
    }
});
