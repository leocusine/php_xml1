class clsInputExDNI extends clsInputExBase{

    constructor (pController, pInputCrtl){
        super();
        this.crtl= pInputCrtl
        this.createListeners();
    }

    createListeners(){
        this.crtl.addEventListener('input',this._onInput.bind(this));
        this.crtl.addEventListener('keydown',this._onKeyDown.bind(this));
    }

///////////////////////////////////////////////////////////////////////////////
    _onInput(e){
        console.log("clsInputExDNI._onInput= " + e.target.value)
        this.ValidateDni(e.target.value)
    }
///////////////////////////////////////////////////////////////////////////////
    ValidateDni(pDNI){
        if (clsValidator.IsDNI(pDNI)){
                    //this.view.setUserMessage("DNI Correcto",1);
            this.crtl.className="inputGreen";

        }
        else{
                    //this.view.setUserMessage("",0);
                    this.crtl.className="inputRed";
        }

    }
///////////////////////////////////////////////////////////////////////////////
     _onKeyDown(event){
        console.log("onkeydown" + event.keyCode + " len ="  );
        if (event.keyCode==8) return;
        
        var len=event.target.value.length

        if (len<8){
            if (!clsValidator.IsANumber(event.keyCode)){
                event.preventDefault();
                return
            }
        }else if (len==8){
            if (!clsValidator.IsALetter(event.keyCode)){
                event.preventDefault();
                return
            }
        }else if (len>8){
                event.preventDefault();
                return

        }
      
        event.target.dataset.previousvalue=event.target.value
        console.log("Text keydown = "+ event.target.value + " len=" +  event.target.value.length)

    }


}