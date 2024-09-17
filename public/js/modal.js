function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.remove('modal-hidden');
        modal.classList.add('modal-show');
    }, 10);
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('modal-show');
    modal.classList.add('modal-hidden');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
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