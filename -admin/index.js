const updateBtn = document.getElementById('updateBtn');

const room0Rent = document.getElementById('room0Rent');
const room1Rent = document.getElementById('room1Rent');
const room2Rent = document.getElementById('room2Rent');
const key = document.getElementById('key');

const updateResponse = document.getElementById('updateResponse');

updateBtn.addEventListener('click', () =>{
	let keyVal = key.value;
	let room0 = room0Rent.value;
	let room1 = room1Rent.value;
	let room2 = room2Rent.value;

	fetchData(keyVal, room0, room1, room2);
});

async function fetchData(keyVal, room0, room1, room2){
	response = await fetch(`https://sputnik.zone/school/Sunne-Hotel/-stuff/-database/authUpdate.php?key=${keyVal}&room0Rent=${room0}&room1Rent=${room1}&room2Rent=${room2}`);
	jsonData = await response.json();

	updateResponse.textContent = jsonData;

	setTimeout(() =>{
		updateResponse.textContent = 'waiting for update';
	},2000);
}