class AppStorage {
    token(token) {
        localStorage.setItem("token", token);
    }
    user(user) {
        localStorage.setItem("user", user);
    }

    store(token, user) {
        this.token(token);
        this.user(user);
    }
    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }
    getToken() {
        localStorage.getItem("token");
    }
    getUser() {
        localStorage.getItem("user");
    }
}
export default AppStorage = new AppStorage();
