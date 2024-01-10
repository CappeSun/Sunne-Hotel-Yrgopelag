const clearSelBtn = document.getElementById('clearSelBtn');

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
	});
}

let start = false;
let end;

async function loadDates(id){
	let response = await fetch(`https://sputnik.zone/school/Akala-Yrgopelag/-stuff/-database/fetchBooking.php?id=${id}`);
	bookingJSON = await response.json();

	bookingJSON.forEach((e) =>{
		for (let i = e.start; i <= e.end; i++){
			dateSquares[i].classList.add('booked');
		}
	});
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

clearSelBtn.addEventListener('click', () =>{
	unmarkDates();
});