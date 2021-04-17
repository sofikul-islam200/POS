<template>
    <div>
        <nav class="breadcrumb sl-breadcrumb">
            <router-link class="btn btn-outline-primary" to="/AddEmploye" style="color:black">Add Employee</router-link>
        </nav>
        <div class="container">
            <div
                class="card pd-20 pd-sm-40 mt-4"
                id="cards"
                style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;"
            >
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="card-body-title">All Employee List</h6>
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
                                <th class="bg-info">
                                    <button type="button" class="btn btn-outline-danger" style="padding: 5px 8px;"><i class="fa fa-trash"></i></button>
                                </th>
                                <th>SL NO</th>
                                <th>NAME</th>
                                <th>PHONE</th>
                                <th>ADDRESS</th>
                                <th>NID NUMBER</th>
                                <th>SALLARY</th>
                                <th>PHOTO</th>
                                <th>J-DATE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(employee, index) in AllEmployees"
                                :key="employee.id"
                            >
                                <td>
                                   <input type="checkbox" name="delete" id="" class="form-control">
                                </td>
                                <td>{{ index + 1 }}</td>
                                <td>{{ employee.name }}</td>
                                <td>{{ employee.phone }}</td>
                                <td>{{ employee.address }}</td>
                                <td>{{ employee.nid_number }}</td>
                                <td>{{ employee.sallary }}</td>
                                <td>
                                    <img
                                        :src="employee.photo"
                                        alt="no photo"
                                        style="width:70px;height:60px"
                                    />
                                </td>
                                <td>{{ employee.j_date }}</td>
                                <td id="action" style="width: 13%;">
                                    <router-link
                                        :to="{name:'EditEmployee',params:{id:employee.id}}"
                                        class="btn btn-sm btn-outline-primary"
                                        id="action"
                                        style="border-radius:20px"
                                        title="edit"
                                        ><i class="fa fa-edit"></i
                                    ></router-link>
                                    <router-link
                                        :to="{name:'ViewEmploye',params:{id:employee.id}}"
                                        class="btn btn-sm btn-outline-info"
                                        id="action"
                                        style="border-radius:20px"
                                        title="view"
                                        ><i class="fa fa-eye"></i
                                    ></router-link>

                                    <a
                                        @click="deleteemploye(employee.id)"
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
import datatable from "datatables.net-bs4";
export default {
    created() {
        if (!User.logIn()) {
            this.$router.push({ name: "/" });
        }
        this.GetAllEmploye();
    },
    data() {
        return {
            AllEmployees: [],
            search: "",
            showTable: false
        };
    },
    methods: {
        tabla() {
            this.$nextTick(() => {
                $("#datatable").DataTable();
            });
        },

        //get all employes from database
        GetAllEmploye() {
            axios.get("/api/AllEmploye/").then(res => {
                this.AllEmployees = res.data;
                this.tabla();
            });
        },

        //delete employe code here

        deleteemploye(id) {
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
                    axios
                        .delete("/api/deleteemployee/"+id)
                        .then(()=> {
                            this.AllEmployees = this.AllEmployees.filter(
                                employeee => {
                                    return employeee.id != id;
                                }
                            );
                         //izitoast success messege 
                            iziToast.success({
                                title: "success",
                                message: "Employe deleted Successfully Done",
                                position: "topRight",
                                timeout: 2000
                            });
                            this.$router.push({ name: "AllEmploye" });

                        })
                        .catch(error => {
                            this.$router.push({ name: "AllEmploye" });
                        });
                }
            });
        }
    }

};
</script>
