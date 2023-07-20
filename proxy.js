const http = require('http');
const request = require('request');

const port = 8081;
const url = 'http://test-cterm.gold.local:8080/roznica_new/ws/ws1.1cws?wsdl';

http.createServer((req, res) => {
  const authString = 'Basic ' + Buffer.from('1cws:1cws').toString('base64'); // То же кодирование, что и в скрипте
  const proxy = request({
    url: url + req.url,
    headers: {
      'Authorization': authString,
      'Content-Type': 'text/xml;charset=UTF-8',
      'Access-Control-Allow-Origin': 'https://7karat.dev.qmedia.by',
      'Access-Control-Allow': 'GET, POST, OPTIONS',
      'Access-Control-Allow-Headers': 'Content-Type'
    }
  });
  
  proxy.on('error', function (err) {
    console.log(`Proxy request error: ${err.message}`);
    res.writeHead(500);
    res.end(`Proxy request error: ${err.message}`);
  });

  req.pipe(proxy).pipe(res);
}).listen(port, () => {
  console.log(`Proxy server listening on port ${port}`);
});