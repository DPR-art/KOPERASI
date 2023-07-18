const menu = document.querySelector(".barang");
const modal = document.querySelectorAll(".modal");
function tes() {
  menu.classList.add("row-cols-lg-1");
  menu.classList.remove("row-cols-lg-5");
}
function cancel() {
  menu.classList.add("row-cols-lg-5");
  menu.classList.remove("row-cols-lg-1");
}
