class clsLoginController {


    constructor(view, model) {


        console.log(">>>>> new object clsLoginController");
        this.model = model;
        this.view = view;
        this.Init();
    }

    
    Init() {

        this.CreateListeners();
    }


    //////////////////////////////////////////////////////////////////////////////


    CreateListeners(){


        let login_button = this.view.getObject("login_button");
        login_button.addEventListener('click',this._onClick.bind(this));


        let username_keyevent = this.view.getObject("username");
        username_keyevent.addEventListener('input', this._onInput.bind(this));


        let password_keyevent = this.view.getObject("password");
        password_keyevent.addEventListener('input', this._onInput.bind(this));
    }


    _onClick(event){

        
        console.log("login pressed")
    }


    _onInput(event_username, event_password) {


        var username = event_username.target.value;
        console.log("username: ",username);


        var password = event_password.target.value;
        console.log("password: ",password);
    }
}


console.log("yoooolmao")


    //////////////////////////////////////////////////////////////////////////////