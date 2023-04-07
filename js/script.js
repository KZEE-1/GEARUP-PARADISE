let navbar = document.querySelector('.header .flex .navbar');
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

let mainImage = document.querySelector('.quick-view .box .row .image-container .main-image img');
let subImages = document.querySelectorAll('.quick-view .box .row .image-container .sub-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      mainImage.src = src;
   }
});

const addBtns = document.querySelectorAll('.add-to-cart-btn');
addBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        btn.classList.add('fade');
        setTimeout(() => {
            btn.classList.add('active');
            btn.classList.remove('fade');
        }, 300); // Change the delay time as needed
        // Add your code to add the item to the cart here
    });
});
