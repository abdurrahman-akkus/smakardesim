let cardContainer = document.getElementById('card-container');
let cardTitle = document.getElementById('card-title');


let formTitle = document.getElementById('card-form-title');

let saveButton = document.getElementById('save-button-card');

formTitle.addEventListener('keyup', function (event) {
  let name = event.target.value;
  cardTitle.innerText = name
})

saveButton.addEventListener('click', function (event) {
  event.preventDefault();

  html2canvas(cardContainer, {
    onrendered: function (canvas) {
      let myImage = canvas.toDataURL("image/png");
      downloadURI("data:" + myImage, "Teşekkür Belgesi.png");
    }
  });
});

function downloadURI(uri, name) {
  let link = document.createElement("a");
  link.download = name;
  link.href = uri;
  link.click();
}
