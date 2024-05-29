const homePage = document.getElementById('homePage');
const roomPage = document.getElementById('roomPage');

const rooms = document.getElementsByClassName('roomCard');

const backBtn = document.getElementById('backBtn');

const roomPageTitle = document.getElementById('roomPageTitle');
const roomPageDesc = document.getElementById('roomPageDesc');
const roomPageImg = document.getElementById('roomPageImg');

let isRoom = false;

let jsonData;

async function fetchData(){
	let response = await fetch(`https://sputnik.zone/school/Sunne-Hotel/-stuff/-database/dbLoadRoom.php`);
	jsonData = await response.json();
} fetchData();

function toRoompage(id){
	if (isRoom) return;
	isRoom = true;

	roomPage.scrollTo({
		top: 0
	});

	homePage.classList.add('aniHomePage');

	roomPageTitle.textContent = jsonData[id]['name'];
	roomPageDesc.textContent = jsonData[id]['desc'];
	roomPageImg.src = `-stuff/-images/room${id}.png`;

	rent = jsonData[id]['rent'];
	updateCost();

	setTimeout(() =>{
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

for (let i = 0; i < rooms.length; i++){
	rooms[i].addEventListener('click', () =>{
		unmarkDates();
		clearDates();
		loadDates(i+1);
		toRoompage(i);
	});
}

backBtn.addEventListener('click', () =>{
	toHomepage();
});