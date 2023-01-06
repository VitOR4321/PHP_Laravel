window.onload=function(){
    var sb = document.getElementById("subbutton");
    sb.addEventListener("click", logSubmit);
    const log = document.getElementById('log');

}


function logSubmit(event) {
  log.textContent = `Form Submitted! Time stamp: ${event.timeStamp}`;
  event.preventDefault();
}





