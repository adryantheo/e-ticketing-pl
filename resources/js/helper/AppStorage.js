class AppStorage
{
    storeToken(token){
        localStorage.setItem('ticketing-token', token)
    }

    storeUser(user){
        localStorage.setItem('ticketing-user', user)
    }

    storeName(name){
        localStorage.setItem('Name', JSON.parse(name))
    }

    storeEmail(email){
        localStorage.setItem('Email', JSON.parse(email))
    }

    storeRole(role){
        
        localStorage.setItem('Role', JSON.parse(role))
    }

    store(token, user){
        this.storeUser(token);
        this.storeToken(user);
    }

    getInfo(role){
        this.storeEmail(email)
        this.storeName(name)
        this.storeRole(role)
    }


    clear(){
        localStorage.removeItem('ticketing-token')
        localStorage.removeItem('ticketing-user')
        localStorage.removeItem('Owner')
        localStorage.removeItem('Role')
    }

    getToken(){
        return localStorage.getItem('ticketing-token')
    }

    getUser(){
        let user = localStorage.setItem('ticketing-user')
        return JSON.parse(user)
    }
}
export default AppStorage = new AppStorage();