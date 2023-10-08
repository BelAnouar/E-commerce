
import { Application } from '@splinetool/runtime';

const canvas = document.getElementById('canvas3d');
const app = new Application(canvas);
app.load('https://prod.spline.design/edKsaQcAUOKGMKLP/scene.splinecode');


const btnsOpenModal = document.querySelector('.btn-text');
const modalVideo=document.querySelector('.video')
const overlay=document.querySelector('.overlay')
const vid1= document.querySelectorAll('iframe')[0];
const vid2 =document.querySelectorAll('iframe')[1];


const openModal = function () {
modalVideo.classList.remove('hidden');
overlay.classList.remove('hidden');

};
const closeModal = function () {
modalVideo.classList.add('hidden');
overlay.classList.add('hidden');

};
btnsOpenModal.addEventListener('click', openModal);
overlay.addEventListener('click', closeModal);



$(".Brows-img").on("mouseover",function(event){
   $(this).addClass("pressed");

})

$(".Brows-img").on("mouseout",function(event){
  setTimeout($(this).removeClass("pressed"),3000)
})

$('.btn-card').on("click",function(){
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');

})
