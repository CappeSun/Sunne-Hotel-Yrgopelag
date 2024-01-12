const clearSelBtn = document.getElementById('clearSelBtn');
const bookingBtn = document.getElementById('bookingBtn');

const name = document.getElementById('name');
const tCode = document.getElementById('tCode');
const redeem = document.getElementById('redeem');
const extra1 = document.getElementById('extra1');
const extra2 = document.getElementById('extra2');
const extra3 = document.getElementById('extra3');
const totalCost = document.getElementById('totalCost');

let dateSquares = [];

dateSquares[1] = document.getElementById('dateSquare1');
dateSquares[2] = document.getElementById('dateSquare2');
dateSquares[3] = document.getElementById('dateSquare3');
dateSquares[4] = document.getElementById('dateSquare4');
dateSquares[5] = document.getElementById('dateSquare5');
dateSquares[6] = document.getElementById('dateSquare6');
dateSquares[7] = document.getElementById('dateSquare7');
dateSquares[8] = document.getElementById('dateSquare8');
dateSquares[9] = document.getElementById('dateSquare9');
dateSquares[10] = document.getElementById('dateSquare10');
dateSquares[11] = document.getElementById('dateSquare11');
dateSquares[12] = document.getElementById('dateSquare12');
dateSquares[13] = document.getElementById('dateSquare13');
dateSquares[14] = document.getElementById('dateSquare14');
dateSquares[15] = document.getElementById('dateSquare15');
dateSquares[16] = document.getElementById('dateSquare16');
dateSquares[17] = document.getElementById('dateSquare17');
dateSquares[18] = document.getElementById('dateSquare18');
dateSquares[19] = document.getElementById('dateSquare19');
dateSquares[20] = document.getElementById('dateSquare20');
dateSquares[21] = document.getElementById('dateSquare21');
dateSquares[22] = document.getElementById('dateSquare22');
dateSquares[23] = document.getElementById('dateSquare23');
dateSquares[24] = document.getElementById('dateSquare24');
dateSquares[25] = document.getElementById('dateSquare25');
dateSquares[26] = document.getElementById('dateSquare26');
dateSquares[27] = document.getElementById('dateSquare27');
dateSquares[28] = document.getElementById('dateSquare28');
dateSquares[29] = document.getElementById('dateSquare29');
dateSquares[30] = document.getElementById('dateSquare30');
dateSquares[31] = document.getElementById('dateSquare31');

for (let i = 1; i < 32; i++){
	dateSquares[i].addEventListener('click', () =>{
		selectDate(i);
		updateCost();
	});
}

let roomId;
let start = false;
let end;
let extras = '000';
let rent;

async function loadDates(id){
	let response = await fetch(`https://sputnik.zone/school/Akala-Yrgopelag/-stuff/-database/fetchBooking.php?id=${id}`);
	bookingJSON = await response.json();

	bookingJSON.forEach((e) =>{
		for (let i = e.start; i <= e.end; i++){
			dateSquares[i].classList.add('booked');
		}
	});

	roomId = id;
}

function clearDates(){
	for (let i = 1; i < 32; i++)
		dateSquares[i].classList.remove('booked');
}

function selectDate(day){
	if (dateSquares[day].classList.contains('booked')) return;

	if (!start){
		start = day;
		end = day;
		console.log('first');
		console.log('start:',start);
		console.log('end:',end);
	}else if (day < start){
		for (let i = day; i < end; i++)
			if (dateSquares[i].classList.contains('booked')) return;
		start = day;
		console.log('second');
		console.log('start:',start);
		console.log('end:',end);
	}else{
		for (let i = start; i < day; i++)
			if (dateSquares[i].classList.contains('booked')) return;
		end = day;
		console.log('third');
		console.log('start:',start);
		console.log('end:',end);
	}

	markDates();
}

function markDates(){
	for (let i = 1; i < 32; i++)
		dateSquares[i].classList.remove('selected');

	for (let i = start; i <= end; i++)
		dateSquares[i].classList.add('selected');
}

function unmarkDates(){
	for (let i = 1; i < 32; i++)
		dateSquares[i].classList.remove('selected');

	start = false;
}

function updateCost(){
	totalCost.textContent = `Total Cost: ${(start ? rent*(end-start+1) : 0) + (extra1.checked ? 200 : 0) + (extra2.checked ? 300 : 0) + (extra3.checked ? 600 : 0)}`;
}

async function booking(){
	extras = (extra1.checked ? '1' : '0')+(extra2.checked ? '1' : '0')+(extra3.checked ? '1' : '0');

	console.log(extras);

	let response = await fetch("https://sputnik.zone/school/Akala-Yrgopelag/-stuff/-database/createBooking.php",
	{
	    method: "POST",
	    body: JSON.stringify({
	    	id: roomId,
	    	start: start,
	    	end: end,
	    	extras: extras,
	    	name: name.value,
	    	tCode: tCode.value,
	    	redeem: redeem.value
	    })
	});

	let responseJSON = await response.json();

	console.log(responseJSON);
}

clearSelBtn.addEventListener('click', () =>{
	unmarkDates();
	updateCost();
});

bookingBtn.addEventListener('click', () =>{
	if (!start) return;
	booking();
});

extra1.addEventListener('change', () =>{
	updateCost();
});

extra2.addEventListener('change', () =>{
	updateCost();
});

extra3.addEventListener('change', () =>{
	updateCost();
});