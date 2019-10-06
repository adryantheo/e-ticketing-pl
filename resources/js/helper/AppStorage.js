class AppStorage
{
    storeToken(token){
        localStorage.setItem('ticketing-token', token);
    }

    storeUser(user){
        localStorage.setItem('ticketing-user', user);
    }

    storeRole(role){ 
        localStorage.setItem('Role', JSON.parse(role));
    }
    
    storeEmail(email){
        localStorage.setItem('Email', JSON.parse(email));
    }


    store(token, user){
        this.storeUser(token);
        this.storeToken(user);
    }

    getInfo(role){
        this.storeRole(role);
    }

    getItem(email){
        this.storeEmail(email);
    }

    clear(){
        localStorage.removeItem('ticketing-token');
        localStorage.removeItem('ticketing-user');
        localStorage.removeItem('Role') ;
        localStorage.removeItem('Email');
    }

    getToken(){
        return localStorage.getItem('ticketing-token')
    }

    getUser(){
        let user = localStorage.getItem('ticketing-user')
        return JSON.parse(user)
    }
}
export default AppStorage = new AppStorage();