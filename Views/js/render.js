function render(fileName) {
    const httpReq = new XMLHttpRequest;
    const toRender = document.getElementById("root");
    httpReq.onreadystatechange = function() {
        if (this.DONE) {
            toRender.innerHTML = this.responseText;
        }
    };
    httpReq.open("GET", `${fileName}`);
    httpReq.send();
};