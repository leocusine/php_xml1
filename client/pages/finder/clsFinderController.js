class clsFinderController {

    constructor(view, model) {
        console.log(">>>>> new object clsFinderController");
        this.model = model;
        this.view = view;
        this.Init();
    }


    // init

    Init() {
        this.CreateListeners();
    }

    // createlisteners
    // _onClick, _onChange

    //////////////////////////////////////////////////////////////////////////////

    CreateListeners(){
        // console.log(">>>>> new clsFinderView CreateListeners");
        // let button = document.getElementById("myButton");
        let button = this.view.getObject("myButton");
        button.addEventListener('click',this._onClick.bind(this));
        // button.addEventListener('click', (event) => { event.preventDefault(); return console.log("button pressed"); });

        // let keyboard = document.getElementById("busqueda");
        let keyboard = this.view.getObject("busqueda");
        keyboard.addEventListener('input', this._onInput.bind(this));
        // keyboard.addEventListener('keydown', (event) => console.log(event.key));

        let terms = this.view.getObject("condiciones");
        terms.addEventListener('click', this._onClickTerms.bind(this));


    }

    _onClick(event){
        // event.preventDefault(); 
        // \--> Porque el comportamiento por defecto del botón hace que la página se recargue al momento de enviar, y eso es algo que no queremos que pase, que haya parpadeos
        console.log("button pressed")
        // console.log(event.target)
    }

    _onInput(event) {
        // event.preventDefault(); 
        // \--> En este caso no es necesario ya que el comportamiento por defecto del keydown es dibujar en pantalla las teclas que escribimos
        var text = event.target.value;
        let button = this.view.getObject("myButton");
        console.log("texto escritodgdfg: ",text);

        if (clsValidator.validar(text) === false){
            console.log("DNI no valido");
            button.disabled = true;
        } else {
            console.log("DNI valido")
            button.disabled = false;
        }
    }

    _onClickTerms(event) {
        let text = this.view.getObject("myButton");
        text.textContent = "Enviar";
    }
}

    //////////////////////////////////////////////////////////////////////////////
