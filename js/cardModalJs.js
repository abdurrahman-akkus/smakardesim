let title = document.getElementById("card-form-title")
let cardTitle = document.getElementById("card-title")
title.addEventListener("keyup",(event)=>{
  cardTitle.innerHTML = event.target.value;
})

function downloadDiv() {

  let node = document.getElementById('card-container');
  let cardImg = document.getElementById('card-image');
  let cardQr = document.getElementById('qr-code');
  let cardLogo = document.getElementById('card-logo');
  let cardMsg = document.getElementById('card-msg');
  let cardFont = document.querySelectorAll(".card-font")

  node.style.width = "1000px"
  node.style.height = "1000px"
  cardImg.style.height = "400px"
  cardImg.style.width = "800px"
  cardQr.style.height = "100px"
  cardQr.style.width ="100px"
  cardLogo.style.height ="120px"
  cardLogo.style.width ="120px"
  cardMsg.style.fontSize = "25px"
  cardFont.forEach(element=>{
    element.style.fontSize = "25px"
  })


  domtoimage.toPng(node)
    .then(function (dataUrl) {
      var img = new Image();
      img.src = dataUrl;
      downloadURI(dataUrl, "Teşekkür Belgesi.png")
    })
    .catch(function (error) {
      console.error('oops, something went wrong!', error);
    });

}

function downloadURI(uri, name) {
  var link = document.createElement("a");
  link.download = name;
  link.href = uri;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  delete link;
}






// let cardContainer = document.getElementById('card-container');
// let cardTitle = document.getElementById('card-title');


// let formTitle = document.getElementById('card-form-title');

// let saveButton = document.getElementById('save-button-card');

// formTitle.addEventListener('keyup', function (event) {
//   let name = event.target.value;
//   cardTitle.innerText = name
// })

// saveButton.addEventListener('click', function (event) {
//   event.preventDefault();


//   html2canvas(cardContainer, {
//     height:1000,
//     width:600,
//     onrendered: function (canvas) {
//       let myImage = canvas.toDataURL("image/png");
//       downloadURI("data:" + myImage, "Teşekkür Belgesi.png");
//     }
//   });
// });

// function downloadURI(uri, name) {
//   let link = document.createElement("a");
//   link.download = name;
//   link.href = uri;
//   link.click();
// }


// // HTML TO PDF
// // let cardContainer = document.getElementById('card-container');
// // let cardTitle = document.getElementById('card-title');


// // let formTitle = document.getElementById('card-form-title');

// // let saveButton = document.getElementById('save-button-card');

// // formTitle.addEventListener('keyup', function (event) {
// //   let name = event.target.value;
// //   cardTitle.innerText = name
// // })

// // saveButton.addEventListener('click', function (event) {
// //   event.preventDefault();

// //   html2pdf()
// //     .from(cardContainer)
// //     .save();
// // });