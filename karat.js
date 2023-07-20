const username = '1cws';
const password = '1cws';

fetch('http://test-cterm.gold.local:8080/roznica_new/ws/ws1.1cws?wsdl', {
  method: 'GET',
  headers: {
    'Content-Type': 'text/xml;charset=UTF-8',
    'Authorization': 'Basic ' + btoa(username + ":" + password),
  }
})
.then(response => response.text())
.then(data => {
  console.log(data);
})
.catch(error => {
  console.log(error);
});






