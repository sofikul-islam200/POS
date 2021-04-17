<template>
    <div>
         <div>
     <nav class="breadcrumb sl-breadcrumb">
       <router-link class="btn btn-outline-primary" to="/AllCustomer" style="color:black">All Customer</router-link>
      </nav>
    <div class="container">
        <div class="card pd-20 pd-sm-40 mt-4" id="cards" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
            <h6 class="card-body-title">Add New Customer</h6><br/>
            <div class="form-layout">
                <form method="post" @submit.prevent="addCustomer">
                    <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Name:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="name"
                                v-model="form.name"
                                placeholder="Enter Name"
                            />
                            <small class="text-danger" v-if="this.errors.name">{{this.errors.name[0]}} </small>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Email:
                                <span class="tx-danger">*</span></label
                            >
                           <input
                                class="form-control"
                                type="email"
                                name="email"
                                v-model="form.email"
                                placeholder="Enter Email"
                            />
                             <small class="text-danger" v-if="this.errors.email">{{this.errors.email[0]}} </small>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                >Inter Phone:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="number"
                                name="phone"
                                v-model="form.phone"
                                placeholder="Enter Phone"
                            />
                             <small class="text-danger" v-if="this.errors.phone">{{this.errors.phone[0]}} </small> 
                        </div>
                    </div>
                    <!-- col-8 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Your Country:
                                <span class="tx-danger">*</span></label
                            >
                            <select name="country" class="form-control" v-model="form.country">
                                 <option value="0">Select Country</option>
                                 <option value="bangladesh">Bangladesh</option>
                                 <option value="india">India</option>
                                 <option value="pakistan">Pakistan</option>
                            </select>
                             <small class="text-danger" v-if="this.errors.country">{{this.errors.country[0]}} </small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                >Current Address:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="current_address"  
                                v-model="form.current_address"
                                placeholder="Enter current_address"
                            />
                             <small class="text-danger" v-if="this.errors.current_address">{{this.errors.current_address[0]}} </small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                > Photo:
                                <span class="tx-danger">*</span></label
                            >
                            <input
                                class="form-control"
                                type="file"
                                name="photo"
                                @change="Image"   
                            />
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                           <img :src="form.photo" alt="Customer Image" style="width:100px;height:100px;">
                        </div>
                    </div>
                    <!-- col-4 -->
                </div>
                <!-- row -->


                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5"> Add Now </button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
               </form>
                <!-- form-layout-footer -->
            </div>
            <!-- form-layout -->
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
           form:{
               name:'',
               email:'',
               phone:'',
               current_address:'',
               country:'',
               photo:''
           },
           errors:{},
        }
    },
    methods:{
        Image(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
               iziToast.error({
                title: 'Error',
                message: 'image size less than 1 MB',
                position:'topRight',
                timeout:2000,
              });
            }else{
                let Reader = new FileReader();
                Reader.onload = event =>{
                     this.form.photo = event.target.result;
                }
                Reader.readAsDataURL(file);
            }
        },

        addCustomer(){
             axios.post('/api/addCustomer/',this.form)
                 .then(()=>{
                       iziToast.success({
                        title: 'success',
                        message: 'successfully add customer done',
                        position:'topRight',
                        timeout:2000,
                    });
                    this.$router.push({name:'AllCustomer'})
                 })
                 .catch(error => {
                      this.errors = error.response.data.errors;
                 })
        }
    }
}
</script>