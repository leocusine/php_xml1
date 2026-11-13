class clsValidator{
    constructor(){


    }
////////////////////////////////////////////////////////
    static IsDNI(dni){
        const numero = dni.slice(0, -1);
        const letra = dni.slice(-1).toUpperCase();
        const letras = "TRWAGMYFPDXBNJZSQVHLCKET";
        
        const regex = /^\d{8}[A-Z]$/i;
        if (!regex.test(dni)) return false;

        const indice = parseInt(numero, 10) % 23;
        return letras.charAt(indice) === letra;
    }
////////////////////////////////////////////////////////
    static IsALetter(pValue){
        return pValue >= 65 && pValue <= 90;
    }
////////////////////////////////////////////////////////
    static IsANumber(pValue){
        if (pValue >= 48 && pValue <= 57) {
            return true;
        }
    }

}