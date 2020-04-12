//Servicio que crea el objeto axios para realizar peticiones

import axios from 'axios';

//const baseURL='https://reqres.in/api/';

const baseURI='../components/API/Api.php';

export default {
    registro(email,pass){
        const user={email,pass};
        return axios.post(baseURI+'regiser',user);
    },
    getDatos(){
        return axios.get(baseURI);
    }
    
};