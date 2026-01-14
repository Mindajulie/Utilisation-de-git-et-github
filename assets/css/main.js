


document.addEventListener("DOMContentLoaded", () => {

  document.querySelectorAll(".hover").forEach(card => {
    card.addEventListener("mouseenter", () => { card.style.transform="scale(1.04)"; });
    card.addEventListener("mouseleave", () => { card.style.transform="scale(1)"; });
  });

  document.querySelectorAll(".delete").forEach(btn => {
    btn.addEventListener("click", e => {
      if(!confirm("Supprimer définitivement ?")) e.preventDefault();
    });
  });

  document.querySelectorAll(".counter").forEach(counter => {
    let start=0,end=parseInt(counter.dataset.target),speed=Math.max(10,end/50);
    let interval=setInterval(()=>{
      start++;
      counter.innerText=start;
      if(start>=end) clearInterval(interval);
    },speed);
  });

  const toastEl=document.getElementById("toast");
  if(toastEl && new URLSearchParams(window.location.search).has("success")){
    new bootstrap.Toast(toastEl).show();
  }

});