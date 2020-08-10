var viewProfile = document.querySelector(".view-profile");
var modalContainer = document.querySelector(".profile-modal-container");
var closeModalContainer = document.querySelector(".close-profile");

viewProfile.addEventListener("click", function() {
  modalContainer.classList.add("profile-modal-container-active");
});

closeModalContainer.addEventListener("click", function() {
  modalContainer.classList.remove("profile-modal-container-active");
});
