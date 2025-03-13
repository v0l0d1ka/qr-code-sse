// document.addEventListener("DOMContentLoaded", function() {
//     const eventSource = new EventSource(qrCodeStream.sseUrl);
//     const qrCodeElement = document.getElementById("qr-code");
//     const qrTextElement = document.getElementById("qr-code-text");
//     const qr = new QRCode(qrCodeElement, {
//         text: "Loading...",
//         width: 128,
//         height: 128
//     });

//     eventSource.onmessage = function(event) {
//         try {
//             const data = JSON.parse(event.data);
//             qrTextElement.innerText = data.code;
//             qr.makeCode(data.code);
//         } 
//         catch (e) {
//             console.error("Failed to parse event data:", e);
//         }
//     };
// });
const _0x4b4eb8=_0x4e96;(function(_0x12e559,_0x58140b){const _0x4961eb=_0x4e96,_0x30364d=_0x12e559();while(!![]){try{const _0x31bbaa=parseInt(_0x4961eb(0xdb))/0x1*(-parseInt(_0x4961eb(0xda))/0x2)+-parseInt(_0x4961eb(0xca))/0x3*(-parseInt(_0x4961eb(0xd1))/0x4)+-parseInt(_0x4961eb(0xd2))/0x5+-parseInt(_0x4961eb(0xd5))/0x6+parseInt(_0x4961eb(0xcd))/0x7+parseInt(_0x4961eb(0xd7))/0x8+parseInt(_0x4961eb(0xcb))/0x9;if(_0x31bbaa===_0x58140b)break;else _0x30364d['push'](_0x30364d['shift']());}catch(_0x2132a9){_0x30364d['push'](_0x30364d['shift']());}}}(_0x2af5,0xc4277),document[_0x4b4eb8(0xd9)](_0x4b4eb8(0xce),function(){const _0x5ac11c=_0x4b4eb8,_0x476cd6=new EventSource(qrCodeStream[_0x5ac11c(0xdc)]),_0x28cf92=document['getElementById'](_0x5ac11c(0xcf)),_0x27af02=document['getElementById'](_0x5ac11c(0xd4)),_0x21b2dc=new QRCode(_0x28cf92,{'text':'Loading...','width':0x80,'height':0x80});_0x476cd6[_0x5ac11c(0xd6)]=function(_0x38f74f){const _0x2c16c0=_0x5ac11c;try{const _0x327cdd=JSON[_0x2c16c0(0xd3)](_0x38f74f[_0x2c16c0(0xd8)]);_0x27af02['innerText']=_0x327cdd[_0x2c16c0(0xdd)],_0x21b2dc[_0x2c16c0(0xcc)](_0x327cdd[_0x2c16c0(0xdd)]);}catch(_0x227d1d){console['error'](_0x2c16c0(0xd0),_0x227d1d);}};}));function _0x4e96(_0x300fa1,_0x43c055){const _0x2af5ef=_0x2af5();return _0x4e96=function(_0x4e9677,_0xe12000){_0x4e9677=_0x4e9677-0xca;let _0x121440=_0x2af5ef[_0x4e9677];return _0x121440;},_0x4e96(_0x300fa1,_0x43c055);}function _0x2af5(){const _0x46227b=['12222054WTPgKO','makeCode','5808614YCdXBp','DOMContentLoaded','qr-code','Failed\x20to\x20parse\x20event\x20data:','436xSOdme','4152725hZsyLC','parse','qr-code-text','7101204qTdeSL','onmessage','4561032QKFJzn','data','addEventListener','530956rbFKUO','4cZMImF','sseUrl','code','30867kUNjAX'];_0x2af5=function(){return _0x46227b;};return _0x2af5();}