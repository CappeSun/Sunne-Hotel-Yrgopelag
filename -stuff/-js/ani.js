const welcomeImgCont = document.getElementById('welcomeImgCont');

homePage.addEventListener('scroll', () =>{
	welcomeImgCont.style.top = `${homePage.scrollTop/25-10}vw`;
});