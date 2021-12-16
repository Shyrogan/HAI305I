const windowWidth = window.innerWidth;
const windowHeight = window.innerHeight;

window.onload = function () {
	const body = document.getElementById("background-container");

	document.addEventListener("mousemove", (e) => {
		const mouseX = e.clientX / windowWidth;
		const mouseY = e.clientY / windowHeight;
		body.style.transform = `translate(-${mouseX}%, -${mouseY}%)`;
	});
};
