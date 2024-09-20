function deletePost(e){
    'use strict'
    console.log(e.dataset.id);
    if (confirm('本当にキャンセルしてよろしいですか？')) {
        const form = document.getElementById('delete_' + e.dataset.id);
        
        // form が取得できているか確認
        if (form) {
            console.log('Form found, submitting...');
            form.submit();
        } else {
            console.error('Form not found for ID:', e.dataset.id);
        }
    }
}