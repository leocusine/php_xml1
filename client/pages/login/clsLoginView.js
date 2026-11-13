class clsLoginView extends clsBaseView {


    constructor() {
        super();
        console.log(">>>>> new object clsLoginView ");
        this.container = document.getElementById("login");
        this.Render();

    }


    Render() {

        
        let div = document.createElement("div");


        div.innerHTML = `
        <h1>Log in</h1>
        <form action="#" method="get">

            <label for="login">Enter your user name and password:</label>
            <input 
                type="text" 
                id="username" 
                name="username"
                placeholder="User name"
            >
            <input 
                type="password" 
                id="password" 
                name="password"
                placeholder="Password"
            >

            <!-- Botón enviar -->
            <button id="login_button" type="submit">Log in</button>

        </form>`
        ;


        this.Add(div);
    }


    //////////////////////////////////////////////////////////////////////////////


    Add(pObj) {


        this.container.appendChild(pObj);
    }
}


    //////////////////////////////////////////////////////////////////////////////


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








