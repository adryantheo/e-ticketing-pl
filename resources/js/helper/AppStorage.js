class AppStorage
{
    storeToken(token){
        localStorage.setItem('ticketing-token', token)
    }
    storeUser(user){
        localStorage.setItem('ticketing-user', user)
    }

    store(token, user){
        this.storeUser(token);
        this.storeToken(user);
    }

    clear(){
        localStorage.removeItem('ticketing-token')
        localStorage.removeItem('ticketing-user')
    }

    getToken(){
        return localStorage.getItem('ticketing-token')
    }
}
export default AppStorage = new AppStorage();