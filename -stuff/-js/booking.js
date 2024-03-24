const clearSelBtn = document.getElementById('clearSelBtn');
const bookingBtn = document.getElementById('bookingBtn');

const name = document.getElementById('name');
const tCode = document.getElementById('tCode');
const redeem = document.getElementById('redeem');
const extraBreakfast = document.getElementById('extraBreakfast');
const extraConcerts = document.getElementById('extraConcerts');
const extraTour = document.getElementById('extraTour');
const totalCost = document.getElementById('totalCost');

const bookingPopupCont = document.getElementById('bookingPopupCont');
const bookingPopup = document.getElementById('bookingPopup');
const popupText = document.getElementById('popupText');
const popupBtn = document.getElementById('popupBtn');

let dateSquares = [];

for (let i = 1; i < 32; i++)
	dateSquares[i] = document.getElementById(`dateSquare${i}`);

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
	let response = await fetch(`https://sputnik.zone/school/Sunne-Hotel/-stuff/-database/fetchBooking.php?id=${id}`);
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
	}else if (day < start){
		for (let i = day; i < end; i++)
			if (dateSquares[i].classList.contains('booked')) return;
		start = day;
	}else{
		for (let i = start; i < day; i++)
			if (dateSquares[i].classList.contains('booked')) return;
		end = day;
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
	totalCost.textContent = `Total Cost: ${(start ? rent*(end-start+1) : 0) + (extraBreakfast.checked ? 200 : 0) + (extraConcerts.checked ? 300 : 0) + (extraTour.checked ? 600 : 0)}`;
}

async function booking(){
	extras = (extraBreakfast.checked ? '1' : '0')+(extraConcerts.checked ? '1' : '0')+(extraTour.checked ? '1' : '0');

	console.log(extras);

	let response = await fetch("https://sputnik.zone/school/Sunne-Hotel/-stuff/-database/createBooking.php",
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

	popup(responseJSON);

	console.log(responseJSON);
}


function popup(json){
	popupText.textContent = json.msg;
	bookingPopupCont.classList.add('aniBookingPopupCont');
	bookingPopupCont.style.display = 'block';
	bookingPopup.style.animation = 'keyfBookingPopup 0.2s';
	setTimeout(() =>{
		popupText.classList.add('aniPopupText');
	}, 100);
}

clearSelBtn.addEventListener('click', () =>{
	unmarkDates();
	updateCost();
});

bookingBtn.addEventListener('click', () =>{
	if (!start) return;
	booking();
});

extraBreakfast.addEventListener('change', () =>{
	updateCost();
});

extraConcerts.addEventListener('change', () =>{
	updateCost();
});

extraTour.addEventListener('change', () =>{
	updateCost();
});

popupBtn.addEventListener('click', () =>{
	bookingPopupCont.classList.remove('aniBookingPopupCont');
	setTimeout(() =>{
		bookingPopupCont.style.display = '';
		bookingPopup.style.animation = '';
		popupText.classList.remove('aniPopupText');
	}, 500);
});