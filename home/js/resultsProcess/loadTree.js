$(document).ready(function() {

  showImage();

});

function showImage() {

  var job = getQuerystring('job');

  var url ="../../jobs/"+job+"/resultClustering/tree.png";
  console.log(url);

  //confusion matriz
  var img = document.getElementById('treeView');
  img.src= "../../jobs/"+job+"/resultClustering/tree.png";

}
//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
  var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};
