// let node = document.getElementById('card-container');
// let btn = document.getElementById('downloadDiv');

// let options = {
//   quality: 0.99,
//   width: 2000,
//   height: 2000,
// };

// function downloadDiv() {

//   domtoimage.toBlob(node, options)
//     .then(function (blob) {
//       var link=window.URL.createObjectURL(blob);
//       window.location=link;
//       // (blob, 'my-certification.png');
//     });
// }

let title = document.getElementById("card-form-title")
let cardTitle = document.getElementById("card-title")
title.addEventListener("keyup", (event) => {
  cardTitle.innerHTML = event.target.value;
})

function downloadDiv() {

  let node = document.getElementById('card-container');
  let clone = node.cloneNode(true);
  clone.setAttribute("style", "width: 1000px; height: 1000px; padding:30px;");
  // border: 5px solid black")
  //  padding: 15px; border-image: url('../../images/border.png') 30 stretch;")
  // clone.setAttribute("style",  "border: 20px solid transparent; padding: 15px; border-image: url('../../images/border.png') 30 stretch;")
  clone.children[0].setAttribute("style", "width: 900px; height: 400px;  display: block; margin-left: auto; margin-right: auto;");
  clone.children[1].setAttribute("style", "width: 120px; height: 120px;  display: block; margin-left: auto; margin-right: auto;");
  clone.children[2].setAttribute("style", "font-size: 25px;");
  clone.children[3].setAttribute("style", "width: 120px; height: 120px;");
  // .forEach(element=>{
  //   element.style.fontSize = "25px"
  // })
  document.body.appendChild(clone);

  domtoimage.toPng(clone)
    .then(function (dataUrl) {
      downloadURI(dataUrl, "Farkındalık Belgesi.png")
      document.body.removeChild(clone)
    })
    .catch(function (error) {
      console.error('oops, something went wrong!', error);
    });

}

function downloadURI(uri, name) {
  let link = document.createElement("a");
  link.download = name;
  link.href = uri;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  delete link;
}