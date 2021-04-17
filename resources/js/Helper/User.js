import AppStorage from "./AppStorage"
import Token from "./Token"
class User {
     responseAfterLogin(res){
          const token = res.data.access_token;
          const user = res.data.user_id;
          if(Token.isValid(token,user)){
               AppStorage.store(token,user)
          }
     }

     hasToken(){
         const token = localStorage.getItem('token');
         if(token){
             return Token.isValid(token) ? true : false
         }
         return false;
     }

     logIn(){
         return this.hasToken()
     }

     logOut(){
         AppStorage.clear();
     }

     name(){
         if(this.logIn()){
            return  localStorage.getItem('user')
         }
     }

     id(){
         if(this.logIn()){
             const payload = Token.payload(localStorage.getItem('token'))
             return payload.sub
         }
         return false
     }
}

export default User = new User();
