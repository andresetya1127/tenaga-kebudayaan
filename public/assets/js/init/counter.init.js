(() => {
    const counter = document.querySelectorAll(".counter");
    // covert to array
    const array = Array.from(counter);
    // select array element
    array.map((item) => {
        // data layer
        let counterInnerText = item.textContent;

        let count = 0;
        let speed = item.dataset.speed / counterInnerText;
        function counterUp() {
            item.textContent = count++;
            if (counterInnerText < count) {
                clearInterval(stop);
            }
        }
        const stop = setInterval(() => {
            counterUp();
        }, speed);
    });
})();
