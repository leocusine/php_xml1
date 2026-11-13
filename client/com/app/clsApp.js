class clsApp{
    constructor(){
        this.view= null;
        this.model= null;
        this.controller= null;
        this.pages=[];
        this.Init(); 
    }
    /////////////////////////////////////////////////
    Init(){
        this.setPage('INITIAL_SCREEN')
    }
    /////////////////////////////////////////////////
    setPage(pPageId){

        switch (pPageId){
            case 'INITIAL_SCREEN':
                this.view= new clsSplashView("css/slpash.css");
                this.model= new clsSplashModel();
                this.controller= new clsSplashController(this.model, this.view);
                break;
            case 'LOGIN':

                break;
            case 'FINDER':
                this.view= new clsFinderView("css/finder.css");
                this.model= new clsFinderModel();
                this.controller= new clsFinderController(this.model, this.view);
                break;
        }
    }
    /////////////////////////////////////////////////
}