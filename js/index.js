function begin() {
  const n1 = document.getElementById('numOne');
  const n2 = document.getElementById('numTwo');
  const number1 = parseInt(n1.value);
  const number2 = parseInt(n2.value);
  const xhr = new XMLHttpRequest();
  xhr.open(
    'GET',
    `php/Recive.php?numberOne=${number1}&numberTwo=${number2}`,
    true
  );
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = xhr.responseText;
      const aux = JSON.parse(response);
      alert(response);
      alert(`Número uno: ${aux.One}, Número dos: ${aux.Two}`);
    }
  };
  xhr.send(null);
}

function sendPost() {
  const nombre = document.getElementById('nombre').value;
  const edad = document.getElementById('edad').value;
  const ciudad = document.getElementById('ciudad').value;
  const xhr = new XMLHttpRequest();
  xhr.open('POST', `php/Proccess.php`, true);
  const aux = `{nombre = ${nombre}, edad = ${edad}, ciudad = ${ciudad}}`;
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = () => {
    if (xhr.status === 200 && xhr.readyState === 4) {
      const response = xhr.responseText;
      alert(`Posted: [ ${response} ]`);
    }
  };
  xhr.send(aux);
}
