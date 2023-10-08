

$(".login").on("click",function(){
  const error = document.querySelector(".erreur")
  try {
    validation()
  } catch (e) {
      error.append(e.message)
  }
})



function validation(){
  var inputVal=$("input").val();

  if(inputVal==""){
    throw new Error("enter les info")
  }
}
