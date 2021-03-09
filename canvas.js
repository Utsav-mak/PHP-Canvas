const square = document.querySelector('#square')
const triangle = document.querySelector('#triangle')
const polygon = document.querySelector('#polygon')
const line = document.querySelector('#line')
const circle = document.querySelector('#circle')
const ellipse = document.querySelector('#ellipse')
const Reset = document.getElementById('reset')

const canvas = document.getElementById('Canvas')
const ctx = canvas.getContext('2d')

console.log(circle)

var markerColor
var markerWidth

function cireli() {
    var circles = [];
    //var markerColor = "#f00";
    var offsetX = canvas.offsetLeft;
    var offsetY = canvas.offsetTop;
    var startX;
    var startY;
    var isMouseDown = false;
    var circle, radius;
    
    canvas.addEventListener('mousedown', drawCircleMouseDown, false);
    canvas.addEventListener('mouseup', drawCircleMouseUp, false);
    canvas.addEventListener('mousemove', drawCircleMouseMove, false);
    
    function Circle(startX, startY) {
      this.startX = startX;
      this.startY = startY;
      this.radius;
      this.draw = function() {
        ctx.beginPath();
        ctx.arc(this.startX, this.startY, this.radius, 0, 2 * Math.PI);
        ctx.strokeStyle = markerColor;
        ctx.lineWidth = markerWidth;
        ctx.stroke();
      }
    }
    
    function drawCircleMouseDown(e) {
      startX = parseInt(e.clientX - offsetX);
      startY = parseInt(e.clientY - offsetY);
      isMouseDown = true;
      circle = new Circle(startX, startY);
      circles.push(circle);
    }
    
    function drawCircleMouseUp() {
      isMouseDown = false;
      circle = null;
    }
    
    function drawCircleMouseMove(e) {
      if (!isMouseDown) {
        return;
      }
      mouseX = parseInt(e.clientX - offsetX);
      mouseY = parseInt(e.clientY - offsetY);
      circle.radius = getDistance(startX, startY, mouseX, mouseY);
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      circles.forEach(function(circ) {
        circ.draw();
      });
    }
    
    function getDistance(p1X, p1Y, p2X, p2Y) {
      return Math.sqrt(Math.pow(p1X - p2X, 2) + Math.pow(p1Y - p2Y, 2))
    }
}

circle.addEventListener('click', cireli)

ellipse.addEventListener('click', cireli)

line.addEventListener('click', () => {
    console.log('line clicked')

})

polygon.addEventListener('click', () => {
    var cw=canvas.width;
    var ch=canvas.height;
    function reOffset(){
      var BB=canvas.getBoundingClientRect();
      offsetX=BB.left;
      offsetY=BB.top;        
    }
    var offsetX,offsetY;
    reOffset();
    window.onscroll=function(e){ reOffset(); }
    
    ctx.lineWidth= markerColor;
    ctx.strokeStyle=markerColor;
    
    var coordinates = [];
    var isDone=false;
    
    polygon.click(function(){
      isDone=true;
    });
    
    canvas.addEventListener('mousedown', function(e) {
        handleMouseDown(e)
    }) 
    
    function handleMouseDown(e){
      if(isDone || coordinates.length>10){return;}
    
      // tell the browser we're handling this event
      e.preventDefault();
      e.stopPropagation();
    
      mouseX=parseInt(e.clientX-offsetX);
      mouseY=parseInt(e.clientY-offsetY);
      coordinates.push({x:mouseX,y:mouseY});
      drawPolygon();
    }
    
    function drawPolygon(){
      ctx.clearRect(0,0,cw,ch);
      ctx.beginPath();
      ctx.moveTo(coordinates[0].x, coordinates[0].y);
      for(index=1; index<coordinates.length;index++) {
        ctx.lineTo(coordinates[index].x, coordinates[index].y);
      }
      ctx.closePath();
      ctx.stroke();
    }
})

Reset.addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
})