const room0 = document.getElementById('room0');
const room1 = document.getElementById('room1');
const room2 = document.getElementById('room2');

let height = room0.offsetWidth*0.5675;

window.addEventListener('load', () =>{
	room0.style.height = `${height}px`;
	room0.style.fontSize = `${height}px`;
	room1.style.height = `${height}px`;
	room1.style.fontSize = `${height}px`;
	room2.style.height = `${height}px`;
	room2.style.fontSize = `${height}px`;
});

window.addEventListener('resize', () =>{
	height = room0.offsetWidth*0.5675;
	room0.style.height = `${height}px`;
	room0.style.fontSize = `${height}px`;
	room1.style.height = `${height}px`;
	room1.style.fontSize = `${height}px`;
	room2.style.height = `${height}px`;
	room2.style.fontSize = `${height}px`;
});