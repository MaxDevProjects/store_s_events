const closeEventNotif = document.getElementById('closeEventNotif');
const eventBlock = document.getElementById('event');

closeEventNotif.addEventListener('click', () => {
    eventBlock.style.display = 'none';
});