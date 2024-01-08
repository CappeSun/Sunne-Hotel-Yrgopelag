const homePage = document.getElementById('homePage');
const roomPage = document.getElementById('roomPage');

const room0 = document.getElementById('room0');
const room1 = document.getElementById('room1');
const room2 = document.getElementById('room2');
const backBtn = document.getElementById('backBtn');

const roomPageTitle = document.getElementById('roomPageTitle');
const roomPageText = document.getElementById('roomPageText');
const roomPageImg = document.getElementById('roomPageImg');

// const roomTitle = document.getElementById('');

let isRoom = false;

let jsonData;

async function fetchData(){
	let response = await fetch(`https://sputnik.zone/school/temp/akala/dbLoadRoom.php`);
	jsonData = await response.json();
} fetchData();

function toRoompage(id){
	if (isRoom) return;
	isRoom = true;

	roomPage.scrollTo({
		top: 0
	});

	homePage.classList.add('aniHomePage');

	setTimeout(() =>{
		roomPageTitle.textContent = jsonData[id]['name'];
		roomPageText.textContent = jsonData[id]['desc'];
		roomPageImg.src = `-stuff/-images/room${id}.png`;

		homePage.style.visibility = 'hidden';

		roomPage.classList.add('aniRoomPage');
	},150);
}

function toHomepage(){
	roomPage.classList.remove('aniRoomPage');

	setTimeout(() =>{
		homePage.style.visibility = '';

		homePage.classList.remove('aniHomePage');

		isRoom = false;
	},150);
}

// back.addEventListener('click', () =>{
// 	toHomepage();
// })

room0.addEventListener('click', () =>{
	toRoompage(0);
});

room1.addEventListener('click', () =>{
	toRoompage(1);
});

room2.addEventListener('click', () =>{
	toRoompage(2);
});

backBtn.addEventListener('click', () =>{
	toHomepage();
});