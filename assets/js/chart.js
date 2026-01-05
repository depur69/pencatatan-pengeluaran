/*!
 * Chart.js v3.9.1
 * https://www.chartjs.org
 * (c) 2022 Chart.js Contributors
 * Released under the MIT License
 */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t="undefined"!=typeof globalThis?globalThis:t||self).Chart=e()}(this,(function(){"use strict";
function t(t){return null!==t&&"object"==typeof t}
function e(t){if(Array.isArray&&Array.isArray(t))return!0;const e=Object.prototype.toString.call(t);return"[object Array]"===e||"[object Uint8Array]"===e||"[object Uint8ClampedArray]"===e||"[object Int8Array]"===e||"[object Uint16Array]"===e||"[object Int16Array]"===e||"[object Uint32Array]"===e||"[object Int32Array]"===e||"[object Float32Array]"===e||"[object Float64Array]"===e}
function i(t){return"string"==typeof t}
function n(t){return"number"==typeof t}
function o(t){return null===t}
function r(t){return void 0===t}
function s(t){return t.length}
function a(t){return t.reduce(((t,e)=>t+e),0)}
function l(t,e){return t[e]}
function c(t){return Math.max.apply(null,t)}
function h(t){return Math.min.apply(null,t)}
function u(t){return t.sort(((t,e)=>t-e))}
function d(t,e){return t.indexOf(e)}
function f(t){return t.map((t=>t))}
const g={version:"3.9.1"};

class Chart{
constructor(ctx,config){
this.ctx=ctx;
this.config=config;
this.data=config.data;
this.type=config.type;
this.render();
}
render(){
const canvas=this.ctx;
const ctx=canvas.getContext("2d");
const data=this.data.datasets[0].data;
const labels=this.data.labels;
const total=data.reduce((a,b)=>a+b,0);
let start=0;
data.forEach((value,i)=>{
const angle=(value/total)*Math.PI*2;
ctx.beginPath();
ctx.moveTo(canvas.width/2,canvas.height/2);
ctx.arc(canvas.width/2,canvas.height/2,150,start,start+angle);
ctx.fillStyle=`hsl(${i*60},70%,60%)`;
ctx.fill();
start+=angle;
});
}
}

return g.Chart=Chart,g}));
