function deletePost(e){
    'use strict'
    if(confirm('本当にキャンセルしてよろしいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit()
    }
}