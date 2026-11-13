class clsSplashView extends clsBaseView {

        constructor(pCSSfile) {

            
            super(pCSSfile);
            console.log(">>>>> new object clsSplashView");
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
            <header>
                <nav class="navbar">
                    <div class="logo">NEO<span>TECH.</span></div>

                    <ul class="nav-links">
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#servicios">Servicios</a></li>
                        <li><a href="#nosotros">Nosotros</a></li>
                    </ul>

                    <a href="#contacto" class="nav-btn">Comenzar ↗</a>
                </nav>
            </header>

            <main>
                <section class="hero" id="inicio">
                    <div class="hero-content">
                        <span class="tag">● EL FUTURO ES AHORA</span>

                        <h1>
                            TRANSFORMA<br>
                            EL FUTURO<br>
                            <span>CON TECNOLOGÍA.</span>
                        </h1>

                        <p>
                            Innovación, inteligencia y tecnología en un
                            solo lugar. Creamos soluciones digitales para
                            llevar tus ideas al siguiente nivel.
                        </p>

                        <div class="hero-buttons">
                            <a href="#servicios" class="btn-primary">
                                Explorar ahora ↗
                            </a>
                            <a href="#nosotros" class="btn-secondary">
                                Conócenos
                            </a>
                        </div>

                        <div class="stats">
                            <div>
                                <h2>+120</h2>
                                <span>Proyectos</span>
                            </div>
                            <div>
                                <h2>98%</h2>
                                <span>Satisfacción</span>
                            </div>
                            <div>
                                <h2>24/7</h2>
                                <span>Innovación</span>
                            </div>
                        </div>
                    </div>

                    <div class="hero-visual">
                        <div class="glow"></div>
                        <div class="tech-circle">
                            <div class="circle-inner">
                                <span>AI</span>
                            </div>
                        </div>
                        <div class="floating-card card-one">
                            <span>✦</span> Inteligencia Artificial
                        </div>
                        <div class="floating-card card-two">
                            <span>↗</span> Innovación Digital
                        </div>
                    </div>
                </section>

                <section class="services" id="servicios">
                    <div class="section-title">
                        <span class="tag">NUESTRAS SOLUCIONES</span>
                        <h2>Tecnología sin <span>límites.</span></h2>
                    </div>

                    <div class="service-grid">
                        <div class="service-card">
                            <span class="icon">⌘</span>
                            <h3>Desarrollo Web</h3>
                            <p>Experiencias digitales modernas y funcionales.</p>
                        </div>

                        <div class="service-card">
                            <span class="icon">◈</span>
                            <h3>Inteligencia Artificial</h3>
                            <p>Automatización y soluciones inteligentes.</p>
                        </div>

                        <div class="service-card">
                            <span class="icon">⬡</span>
                            <h3>Innovación Digital</h3>
                            <p>Ideas que se convierten en tecnología real.</p>
                        </div>
                    </div>
                </section>

                <section class="about" id="nosotros">
                    <h2>EL SIGUIENTE NIVEL<br>
                        <span>COMIENZA CONTIGO.</span>
                    </h2>
                    <p>Descubre nuevas posibilidades con tecnología diseñada para el futuro.</p>
                    <a href="#contacto" class="btn-primary">Descubrir más ↗</a>
                </section>
            </main>

            <footer id="contacto">
                <div class="logo">NEO<span>TECH.</span></div>
                <p>© 2026 NEOTECH. Innovando el futuro.</p>
            </footer>
        `
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








