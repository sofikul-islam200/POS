//============= authentication  =============//
import login from "./components/auth/login.vue"
import register from "./components/auth/register.vue"
import forgot from "./components/auth/forgot.vue"
import home from "./components/home.vue"
import logout from "./components/auth/logout.vue"
//================= employee =================//
import AddEmploye from "./components/employe/AddEmploye.vue"
import AllEmploye from "./components/employe/AllEmploye.vue"
import ViewEmployee from "./components/employe/ViewEmployee.vue"
import EditEmployee from "./components/employe/EditEmployee.vue"
//======================customer ========================//
import AddCustomer from "./components/customer/AddCustomer.vue"
import AllCustomer from "./components/customer/AllCustomer.vue"
import ViewCustomer from "./components/customer/ViewCustomer.vue"
import NotFound from "./components/customer/NotFount.vue"
import EditCustomer from "./components/customer/EditCustomer.vue"
//======================== category ========================//
import AddCategory from "./components/category/AddCategory.vue"
import AllCategory from "./components/category/AllCategory.vue"
import EditCategory from "./components/category/EditCategory.vue"
//====================== supplier ============================//
import AddSupplier from "./components/supplier/AddSupplier.vue"
import AllSupplier from "./components/supplier/AllSupplier.vue"
import EditSupplier from "./components/supplier/EditSupplier.vue"
//===================== product ==========================//
import AddProduct from "./components/product/AddProduct.vue"
import AllProduct from "./components/product/AllProduct.vue"
import EditProduct from "./components/product/EditProduct.vue";
import ViewProduct from "./components/product/ViewProduct.vue"





export const routes = [




    //==============start authentication routes here =====================//
    { path: '/',component:login,name:'/'},
    { path:'/register',component:register,name:'register'},
    { path:'/forgot',component:forgot,name:'forgot'},
    { path:'/home',component:home,name:'home'},
    { path:'/logout',component:logout,name:'logout'},
    //=============end authentication routes ==============//




    //=============start employee routes here ==============//
    { path:'/AddEmploye',component:AddEmploye,name:'AddEmploye'},
    { path:'/AllEmploye',component:AllEmploye,name:'AllEmploye'},
    { path:'/ViewEmployee/:id',component:ViewEmployee,name:'ViewEmploye'},
    { path:'/EditEmployee/:id',component:EditEmployee,name:'EditEmployee'},
    //======================end employee routes here ===============//






    //=====================start customer routes here ================//
     { path:'/AddCustomer',component:AddCustomer,name:'AddCustomer'},
     { path:'/AllCustomer',component:AllCustomer,name:'AllCustomer'},
     { path:'/ViewCustomer/:id',component:ViewCustomer,name:'ViewCustomer'},
     { path:'*',component:NotFound,name:'NotFound'},
     { path:'/EditCustomer/:id',component:EditCustomer,name:'EditCustomer'},
    //======================end customer routes here ==================//
    

    //=====================start category routes here ================//
      { path:'/AddCategory',component:AddCategory,name:'AddCategory'},
      { path:'/AllCategory',component:AllCategory,name:'AllCategory'},
      { path:'/EditCategory/:id',component:EditCategory,name:'EditCategory'},
    //======================end category routes here ==================//

     

    //=====================start Supplier routes here ================//
        { path:'/AddSupplier',component:AddSupplier,name:'AddSupplier'},
        { path:'/AllSupplier',component:AllSupplier,name:'AllSupplier'},
        { path:'/EditSupplier/:id',component:EditSupplier,name:'EditSupplier'},
    //======================end Supplier routes here ==================//





    //=====================start product routes here ================//
    { path:'/AddProduct',component:AddProduct,name:'AddProduct'},
    { path:'/AllProduct',component:AllProduct,name:'AllProduct'},
    { path:'/EditProduct',component:EditProduct,name:'EditProduct'},
    { path:'/ViewProduct',component:ViewProduct,name:'ViewProduct'},
    
  //======================end product routes here ==================//

  



  ]
