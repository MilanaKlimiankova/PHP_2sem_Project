function openMenu(id) {
  let x= document.getElementById(id);
  x.style.opacity='1';
  x.style.visibility='visible';
}
function closeMenu(id) {
  let x=document.getElementById(id);
  x.style.opacity='0';
  x.style.visibility='hidden';
}