function colOnClickMenu() {
  document.getElementById("list-colon").classList.toggle("change");
}

//file
let fileName = document.getElementById("file-name");
let fileInput = document.getElementById("file-input");

fileInput.onchange = () => {
  fileName.textContent = fileInput.files[0].name;
};
