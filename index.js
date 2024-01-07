const homePage = document.getElementById('homePage');
const roomPage = document.getElementById('roomPage');

const room0 = document.getElementById('room0');
const room1 = document.getElementById('room1');
const room2 = document.getElementById('room2');

// const roomTitle = document.getElementById('');

let isLoading = false;

async function fetchData(){
	let response = await fetch(`https://sputnik.zone/school/temp/dbLoadJson.php?id=1`)
	let jsonData = await response.json();
	return jsonData;
}

let jsonData = fetchData();

function toRoompage(id){
	if (isLoading) return;
	isLoading = true;

	roomPage.scrollTo({
		top: 0
	});

	homePage.classList.add('aniHomePage');

	setTimeout(() =>{
		// roomTitle.textContent = jsonData[id][1];
		// roomDesc.textContent = jsonData[id][2];
		// roomImg.src = jsonData[id][3];

		homePage.style.visibility = 'hidden';

		roomPage.classList.add('aniRoomPage');

		setTimeout(() =>{
			toHomepage();
		},500);
	},150);
}

function toHomepage(){
	roomPage.classList.remove('aniRoomPage');

	setTimeout(() =>{
		homePage.style.visibility = '';

		homePage.classList.remove('aniHomePage');

		isLoading = false;
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