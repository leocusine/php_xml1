class clsBaseView{
    constructor(pCSSfile=''){
        this.cssfile=pCSSfile
        if (pCSSfile!='' ){
            this.changeCSS()
        }
    }
/////////////////////////////////////////////////////////////
    getObject(pId){
        return document.getElementById(pId)
    }
/////////////////////////////////////////////////////////////
    Add(pObj) {
        this.container.appendChild(pObj)
    }
/////////////////////////////////////////////////////////////
    setUserMessage(pMsg, code) {
        var div = document.getElementById("myUserMessageDiv")
        div.textContent = pMsg;

        if (code == 0) div.className = "errMessageNeutral";
        if (code = -1) div.className = "errMessageRed";
        if (code = 1) div.className = "errMessageGreen";

        console.log("-->>setUserMessage " + pMsg)
    }
/////////////////////////////////////////////////////////////
    clear(){
        this.container.innerHTML="";
    }

/////////////////////////////////////////////////////////////
    changeCSS() {

        console.log("CSS solicitado:", this.cssfile);

        let oldlink = document.getElementById("page-css");

        let newlink = document.createElement("link");

        newlink.id = "page-css";
        newlink.rel = "stylesheet";
        newlink.type = "text/css";
        newlink.href = this.cssfile;

        if (oldlink) {
            oldlink.replaceWith(newlink);
        } else {
            document.head.appendChild(newlink);
        }

        console.log("CSS cargado:", newlink.href);
    }
/////////////////////////////////////////////////////////////
}