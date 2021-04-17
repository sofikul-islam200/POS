<template>
       <div>
        <nav class="breadcrumb sl-breadcrumb">
            <router-link class="btn btn-outline-primary" to="/AddSupplier" style="color:black">Add Supplier</router-link>
        </nav>
        <div class="container">
            <div
                class="card pd-20 pd-sm-40 mt-4"
                id="cards"
                style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
            >
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="card-body-title">All Supplier List</h6>
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
                                <th>ADDRESS</th>
                                <th>EMAIL</th>
                                <th>SHOP_NAME</th>
                                <th>SHOP_PHOTO</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                              v-for="(supplier,index) in allsupplier"
                              :key="supplier.id" 
                            >
                                <td>{{index + 1}}</td>
                                <td>{{supplier.name}}</td>
                                <td>{{supplier.phone}}</td>
                                <td>{{supplier.address}}</td>
                                <td>{{supplier.gmail}}</td>
                                <td>{{supplier.shop_name}}</td>
                                <td>
                                    <img
                                        :src="supplier.shop_photo"
                                        alt="no photo"
                                        style="width:70px;height:60px"
                                    />
                                </td>
                                <td id="action" style="width: 13%;">
                                    <router-link
                                        :to="{name:'EditSupplier',params:{id:supplier.id}}"
                                        class="btn btn-sm btn-outline-primary"
                                        id="action"
                                        style="border-radius:20px"
                                        title="edit"
                                        ><i class="fa fa-edit"></i
                                    ></router-link>
                                    <a  
                                        @click="deleteSupplier(supplier.id)"             
                                        class="btn btn-sm btn-outline-danger"
                                        id="action"
                                        style="border-radius:20px;color:red"
                                        title="delete"
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
export default {
    data(){
       return {
           allsupplier:[],
       }
    },
    created(){
        if(!User.logIn()){
            this.$router.push({name:'/'})
        }

        axios.get('/api/getSupplier/')
           .then(res =>{
              this.allsupplier = res.data;
              this.tabla();
           })
           .catch()
    },
    methods:{
         tabla() {
            this.$nextTick(() => {
                $("#datatable").DataTable();
            });
        },
        deleteSupplier(id){
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
                    axios.get('/api/DeleteSupplier/'+ id)
                       .then(() =>{
                           this.allsupplier = this.allsupplier.filter(supplier => {
                                return supplier.id !== id;
                           });
                            iziToast.success({
                            title: 'success',
                            message: 'supplier deleted successfully done',
                            position:'topRight',
                            timeout:2000,
                        });
                       })
                       .catch()          
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