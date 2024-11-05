var accountLink = document.getElementById('accountLink');
var form_Account = document.querySelector('.form_Account');
accountLink.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent default link behavior
    form_Account.style.display = form_Account.style.display === 'block' ? 'none' : 'block';
});

// var accountLink = document.getElementById('accountLink');
// var form_Account = document.querySelector('.form_Account2');
// accountLink.addEventListener('click', (event) => {
//     event.preventDefault(); // Prevent default link behavior
//     form_Account.style.display = form_Account.style.display === 'block' ? 'none' : 'block';
// });
const anhContainer = document.getElementById('anh');
const images = anhContainer.querySelectorAll('img');

setInterval(() => {
    // Ẩn ảnh đang hiển thị
    const activeImage = anhContainer.querySelector('.active');
    activeImage.classList.remove('active');

    // Hiển thị ảnh tiếp theo
    const nextImage = activeImage.nextElementSibling || images[0];
    nextImage.classList.add('active');
}, 2000);