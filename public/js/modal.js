function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    // document.getElementById(modalId).classList.remove('flex');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

 // モーダル外クリックで閉じる
window.onclick = function(event) {
            const modals = document.getElementsByClassName('modal');
            for (let i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].classList.add('hidden');
                }
            }
        }