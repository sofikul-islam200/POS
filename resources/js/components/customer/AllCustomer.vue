<template>
   <div>
        <nav class="breadcrumb sl-breadcrumb">
            <router-link class="btn btn-outline-primary" to="/AddCustomer" style="color:black">Add Customer</router-link>
        </nav>
        <div class="container">
            <div
                class="card pd-20 pd-sm-40 mt-4"
                id="cards"
                style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
            >
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="card-body-title">All Customer List</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table
                        id="datatable"
                        class="table"
                        style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
                    >
                        <thead class="bg-info">
                            <tr>
                               
                                <th>SL NO</th>
                                <th>NAME</th>
                                <th>PHONE</th>
                                <th>EMAIL</th>
                                <th>CURRENT_ADDRESS</th>
                                <th>COUNTRY</th>
                                <th>PHOTO</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(customer,index) in allCustomer" :key="customer.id">
                               
                                <td>{{index + 1 }}</td>
                                <td>{{customer.name}}</td>
                                <td>{{customer.phone}}</td>
                                <td>{{customer.email}}</td>
                                <td>{{customer.current_address}}</td>
                                <td>{{customer.country}}</td>
                                <td>
                                    <img
                                        :src="customer.photo"
                                        alt="no photo"
                                        style="width:70px;height:60px"
                                    />
                                </td>
                                <td id="action" style="width: 13%;">
                                    <router-link :to="{name:'EditCustomer',params:{id:customer.id}}"
                                       
                                        class="btn btn-sm btn-outline-primary"
                                        id="action"
                                        style="border-radius:20px"
                                        title="edit"
                                        ><i class="fa fa-edit"></i
                                    ></router-link>
                                    <router-link :to="{name:'ViewCustomer',params:{id:customer.id}}"
                                       
                                        class="btn btn-sm btn-outline-info"
                                        id="action"
                                        style="border-radius:20px"
                                        title="view"
                                        ><i class="fa fa-eye"></i
                                    ></router-link>

                                    <a
                                        class="btn btn-sm btn-outline-danger"
                                        id="action"
                                        style="border-radius:20px;color:red"
                                        title="delete"
                                        @click="deleteSingleCostomer(customer.id)"
                                        ><i class="fa fa-trash"></i
                                    ></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- card -->
        </div>
    </div>
</template>
<script>
import datatable from "datatables.net-bs4";
export default {
    created(){
       if(!User.logIn()){
           this.$router.push({name:'/'})
       }
       this.GetCustomer();
    },
    data(){
        return{
             allCustomer:[]  
        }
         
    },
    methods:{
         tabla() {
            this.$nextTick(() => {
                $("#datatable").DataTable();
            });
        },
        GetCustomer(){
             axios.get('/api/allCustomer/')
                .then(res =>{
                    this.allCustomer = res.data;
                    this.tabla();
                })
                .catch()
        },

        deleteSingleCostomer(id){
               Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to delete this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.isConfirmed) {
                  
                  axios.delete('/api/deleteSingleCustomer/' + id)
                    .then(res =>{
                          this.allCustomer = this.allCustomer.filter(customer =>{
                                return customer.id != id;
                          })
                     
                     iziToast.success({
                        title: 'success',
                        message: 'customer deleted successfully done',
                        position:'topRight',
                        timeout:2000,
                    });

                    })
                    .catch(error =>{
                        this.$router.push({name:'AllCustomer'})
                    })
               
                 
                }else{
                iziToast.warning({
                title: 'warning',
                message: 'deleteing cancel ..',
                position:'topLeft',
                timeout:2000,
              });
                }
            });
        }
        
    }
}
</script>