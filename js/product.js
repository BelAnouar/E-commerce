
var gt=0
const pr = document.querySelectorAll(".pr");
const quantite =document.querySelectorAll(".qt") ;
const total =document.querySelectorAll(".total");
const Gtotal=document.querySelectorAll(".Gtotal")[1];

$(document).change(function(){
      
    gt=0;
    for (let i = 0; i < pr.length; i++) {
      total[i].innerHTML=(pr[i].value)*(quantite[i].value)
      gt=gt+(pr[i].value)*(quantite[i].value);
    }
    Gtotal.innerHTML=gt;
   
})


$(".tab-product:even").addClass(" bg-light")



const modal=document.querySelector('.modals')
const overlay=document.querySelector('.overlay')
const form1 =document.querySelector('.form1');
const form2=document.querySelector('.form2')
var next=document.querySelector('.btn-next');
var back=document.querySelector('.btn-back')

$('.btn-card').on("click",function(){
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');

  })

const closeModal = function () {
  modal.classList.add('hidden')
  overlay.classList.add('hidden');

};


overlay.addEventListener('click', closeModal);



// const show = document.querySelector('.Show')

// $(".Show").click(function() {

//    // $('.image-pc').css({'background-image':'url("../videos/video.mp4")'}) // get background image using css property

// });

