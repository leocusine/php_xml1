class clsFinderView extends clsBaseView {

    constructor() {
        super();
        console.log(">>>>> new object clsFinderView ");
        this.container = document.getElementById("myAppDiv");
        this.Render();
        // this.CreateListeners();
    }







    Render() {
        // console.log(">>>>> new clsFinderView Render")

        // let rule = document.createElement("hr");
        // rule.className = "ruleheight";
        // document.getElementById("new-clone").appendChild(rule);

        let div = document.createElement("div");

        // En bloque
        div.innerHTML = `
        <h1>Buscar sob</h1>
        <form action="#" method="get">

            <!-- Campo de búsqueda -->
            <label for="busqueda">Texto de búsqueda:</label>
            <input 
                type="text" 
                id="busqueda" 
                name="busqueda"
                placeholder="Escribe lo que quieres buscar"
            >

            <!-- Aceptar condiciones -->
            <div class="condiciones">
                <input 
                    type="checkbox" 
                    id="condiciones" 
                    name="condiciones"
                    required
                >

                <label for="condiciones">
                    Acepto las condiciones
                </label>
            </div>

            <!-- Botón enviar -->
            <button id="myButton" type="submit">Enviar</button>

        </form>`
        ;

        this.Add(div);


       



    }


    //////////////////////////////////////////////////////////////////////////////

    Add(pObj) {
        this.container.appendChild(pObj);
    }

    //////////////////////////////////////////////////////////////////////////////



}




// 1. Creas el elemento
// let labelInput = document.createElement("label");

// 2. Le pones algunas propiedades
// labelInput.setAttribute("for", "clone-search-text");
// labelInput.textContent = "Introduce un texto:";

// 3. ¡Usas console.dir para investigarlo!
// console.dir(labelInput);


// Para clases: 
// document.getElementsByClassName("newclone")[0].appendChild(div); 
// \--> Esto atrapa todoss los elementos que tengan esa clase, por lo que es necesario especificar cual se necesita,haciendo [0]
// document.querySelector(".newclone").appendChild(div); 
// \--> Esto atrapa por defecto la primera coincidencia








