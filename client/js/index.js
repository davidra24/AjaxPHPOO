const server = './server/php/main.php?opt=';
var BingMapsAPIKey =
  'Avj-dfXzcd4uJeJ3EkTxMWpDpa3s_U5EfjlBpgVeCNnStsrM2D8Lme7OYUjPctCa';
function loadDptos() {
  const selDptos = document.getElementById('selectDptos');
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `${server}1`, true);
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      try {
        const dpto = JSON.parse(xhr.responseText);
        dpto.forEach(element => {
          const option = document.createElement('option');
          option.setAttribute('value', element.code);
          option.appendChild(document.createTextNode(element.name));
          selDptos.appendChild(option);
        });
      } catch (error) {
        console.log(error);
      }
    }
  };
  xhr.send(null);
}
function loadTowns() {
  const selTown = document.getElementById('selectTowns');
  const dptos = document.getElementById('selectDptos');
  const xhr = new XMLHttpRequest();
  selTown.innerHTML = 'Seleccione...';
  xhr.open('GET', `${server}2&dpto=${dptos.value}`, true);
  xhr.onreadystatechange = () => {
    if (dptos.selectedIndex != 0) {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const town = JSON.parse(xhr.responseText);
        town.forEach(element => {
          const option = document.createElement('option');
          option.setAttribute('value', element.code);
          option.appendChild(document.createTextNode(element.name));
          selTown.appendChild(option);
        });
      }
    }
  };
  xhr.send(null);
}

function getName(sel) {
  return sel.options[sel.selectedIndex].text;
}

function geocode() {
  document.getElementById('map').src = '';
  const dpto = document.getElementById('selectDptos');
  const town = document.getElementById('selectTowns');
  const container = document.getElementsByClassName('container');
  const width = container[0].offsetWidth;

  if (getName(dpto) === 'Bogotá D.C') {
    var query = `Bogota, Colombia`;
  } else {
    var query = `Colombia, ${getName(dpto)}, ${getName(town)}`;
  }
  console.log(query);
  const geocodeRequest = `https://dev.virtualearth.net/REST/V1/Imagery/Map/Road/${query}?mapSize=${width},720&key=${BingMapsAPIKey}`;
  document.getElementById('map').src = geocodeRequest;
}
