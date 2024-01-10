const homePage = document.getElementById('homePage');
const roomPage = document.getElementById('roomPage');

const room0 = document.getElementById('room0');
const room1 = document.getElementById('room1');
const room2 = document.getElementById('room2');
const backBtn = document.getElementById('backBtn');

const roomPageTitle = document.getElementById('roomPageTitle');
const roomPageDesc = document.getElementById('roomPageDesc');
const roomPageImg = document.getElementById('roomPageImg');

let isRoom = false;

let jsonData;

async function fetchData(){
	let response = await fetch(`https://sputnik.zone/school/Akala-Yrgopelag/-stuff/-database/dbLoadRoom.php`);
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
		roomPageDesc.textContent = jsonData[id]['desc'];
		roomPageImg.src = `-stuff/-images/room${id}.png`;

		homePage.style.display = 'none';

		roomPage.classList.remove('aniRoomPage');
	},150);
}

function toHomepage(){
	roomPage.classList.add('aniRoomPage');

	homePage.style.display = '';

	setTimeout(() =>{
		homePage.classList.remove('aniHomePage');

		isRoom = false;
	},150);
}

room0.addEventListener('click', () =>{
	clearDates();
	loadDates(1);
	toRoompage(0);
});

room1.addEventListener('click', () =>{
	clearDates();
	loadDates(2);
	toRoompage(1);
});

room2.addEventListener('click', () =>{
	clearDates();
	loadDates(3);
	toRoompage(2);
});

backBtn.addEventListener('click', () =>{
	toHomepage();
});