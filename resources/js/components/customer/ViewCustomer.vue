<template>
    <div>
      <div>
     <nav class="breadcrumb sl-breadcrumb">
       <router-link class="btn btn-outline-primary" to="/AllCustomer" style="color:black">All Customer</router-link>
      </nav>
    <div class="container">
        <div class="card pd-20 pd-sm-40 mt-4" id="cards" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
            <h6 class="card-body-title">Single Customer Information</h6><br/>

            <div style="width:100%;border:1px solid black;padding:10px 5px;">
                <div class="row" style="margin-left:40px;">
                     <div class="col-md-4">
                      <label for="">Name : <b>{{this.name}}</b></label>
                 </div>

                 <div class="col-md-4">
                      <label for="">Email : <b>{{this.email}}</b></label>
                 </div>

                 <div class="col-md-4">
                      <label for="">Phone : <b>{{this.phone}}</b></label>
                 </div>
                </div>


                 <div class="row" style="margin-left:40px;">
                     <div class="col-md-4">
                      <label for="">Current_Address : <b>{{this.current_address}}</b></label>
                 </div>

                 <div class="col-md-4">
                      <label for="">Country : <b>{{this.country}}</b></label>
                 </div>
                </div>
            </div>
            
        </div>
        <!-- card -->
    </div>
    </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
          name:'',
          email:'',
          country:'',
          current_address:'',
          phone:'',
        }
    },
    created(){
        if(!User.logIn()){
            this.$router.push({name:'/'});
        }
        this.GetSinleCustomer();
        console.log(this.photo)
    },



    methods:{
        GetSinleCustomer(){ 
         let id = this.$route.params.id;
           axios.get('/api/GetSingleCustomer/'+id)
           .then(res =>{
               this.name = res.data.name;
               this.email = res.data.email;
               this.country = res.data.country;
               this.current_address = res.data.current_address;
               this.phone = res.data.phone;
           })
           .catch()
        }
    }


}
</script>