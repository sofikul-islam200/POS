<template>
   <div>
     <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Forms</a>
        <span class="breadcrumb-item active">Form Layouts</span>
      </nav>
    <div class="container">
        <div class="card pd-20 pd-sm-40 mt-4" id="cards" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
            <h6 class="card-body-title">Employee Information </h6><br/>
            <div class="form-layout">
                <form>
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class=""
                                ><b> Name</b>
                                </label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="name"
                                v-model="form.name"
                                placeholder="Enter Name"
                                disabled
                                style="border:none"
                            />
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                ><b> Email</b>
                               </label
                            >
                           <input
                                class="form-control"
                                type="email"
                                name="email"
                                v-model="form.email"
                                placeholder="Enter Email"
                                disabled
                                style='border:none'
                            />
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"
                                ><b>Phone</b>
                               </label
                            >
                            <input
                                class="form-control"
                                type="number"
                                name="phone"
                                v-model="form.phone"
                                placeholder="Enter Phone"
                                disabled
                                style="border:none"
                            />        
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                ><b>Address</b>
                                </label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="address"
                                v-model="form.address"    
                                placeholder="Enter Address"
                                disabled
                                style="border:none"
                            />
                        </div>
                    </div>
                    <!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                ><b>Nid Number</b>
                                </label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="address"
                                v-model="form.nid_number"    
                                placeholder="Enter Nid Number"
                                disabled
                                style="border:none"
                            />
                           
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                ><b> Sallary</b>
                                </label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="sallary"
                                v-model="form.sallary"    
                                placeholder="Enter Sallary"
                                disabled
                                style="border:none"
                            />
                        
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"
                                ><b>Joining Date</b>
                                </label
                            >
                            <input
                                class="form-control"
                                type="text"
                                name="j_date"
                                v-model="form.j_date"
                                disabled   
                                style="border:none"
                            />
                            
                        </div>
                    </div>
                    <!-- col-4 -->
                </div>
                <!-- row -->
               </form>
                <!-- form-layout-footer -->
            </div>
            <!-- form-layout -->
        </div>
        <!-- card -->
    </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
             form:{
                 name:'',
                 phone:'',
                 email:'',
                 photo:'',
                 j_date:'',
                 nid_number:'',
                 address:'',
                 sallary:''
             }
        }
    },
    created(){
        if (!User.logIn()) {
            this.$router.push({ name: "/" });
        }
        
         let id = this.$route.params.id;
         axios.get('/api/ViewEmploye/'+id)
          .then(({data}) => (this.form = data))
          .catch()
    }
}
</script>