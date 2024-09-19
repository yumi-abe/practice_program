document.addEventListener('DOMContentLoaded', function() {
    const imageInputs = document.querySelectorAll('.image-input');  // 全ての画像入力フィールドを取得
    imageInputs.forEach(function(imageInput) {
        const imagePreview = imageInput.closest('div').querySelector('.image-preview');
        const removeImage = imageInput.closest('div').querySelector('.remove-image');

        // ファイルが選択されたときにプレビュー表示
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    removeImage.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        // 画像削除ボタンの動作
        removeImage.addEventListener('click', function() {
            imagePreview.classList.add('hidden');
            removeImage.classList.add('hidden');
            imageInput.value = '';  // ファイルフィールドをクリア
            imagePreview.src = '';  // プレビューをクリア

            // 削除の意図をサーバーに伝えるためにhiddenフィールドを使う
            const removeImageField = document.createElement('input');
            removeImageField.type = 'hidden';
            removeImageField.name = imageInput.name + '_remove';  // フィールド名を個別に設定
            removeImageField.value = '1';
            imageInput.closest('div').appendChild(removeImageField);
        });

        // 既に画像がある場合はプレビューを表示
        if (imagePreview.src && imagePreview.src !== window.location.href) {
            imagePreview.classList.remove('hidden');
            removeImage.classList.remove('hidden');
        }
    });
});


// document.addEventListener('DOMContentLoaded', function() {
//     const imagePath = document.getElementById('imagePath');
//     const prevImage = document.getElementById('prevImage');
//     const removeImage = document.getElementById('removeImage');

//     // ファイルが選択されたときにプレビュー表示
//     imagePath.addEventListener('change', function(event) {
//         const file = event.target.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function(e) {
//                 prevImage.src = e.target.result;
//                 prevImage.classList.remove('hidden');
//                 removeImage.classList.remove('hidden');
//             }
//             reader.readAsDataURL(file);
//         }
//     });

//     // 画像削除ボタンの動作（フォーム送信せずに画像削除のみを行う）
//     removeImage.addEventListener('click', function() {
//         prevImage.classList.add('hidden');
//         removeImage.classList.add('hidden');
//         imagePath.value = '';  // ファイルフィールドをクリア
//         prevImage.src = '';  // プレビューをクリア

//         // 削除の意図をサーバーに伝えるためにhiddenフィールドを使う
//         const removeImageField = document.createElement('input');
//         removeImageField.type = 'hidden';
//         removeImageField.name = 'remove_image';
//         removeImageField.value = '1';
//         removeImage.appendChild(removeImageField);
//     });

//     // 既に画像がある場合はプレビューを表示
//     if (prevImage.src && prevImage.src !== window.location.href) {
//         prevImage.classList.remove('hidden');
//         removeImage.classList.remove('hidden');
//     }
// });
