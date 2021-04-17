<template>
    <div>
        <div id="content">
            <form method="post" @submit.prevent="login">
                <div
                    class="d-flex align-items-center justify-content-center  ht-100v"
                >
                    <div id="box" style="margin-right: 172px;margin-bottom:110px;"
                        class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white"
                    >
                        <div
                            class="signin-logo tx-center tx-24 tx-bold tx-inverse"
                        >
                            Welcome <span class="tx-info tx-normal">admin</span>
                        </div>
                        <div class="tx-center mg-b-60">
                            Inventory Management System
                        </div>

                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="forms.email"
                                placeholder="Enter your username"
                            />
                        </div>
                        <!-- form-group -->
                        <div class="form-group">
                            <input
                                type="password"
                                class="form-control"
                                v-model="forms.password"
                                placeholder="Enter your password"
                            />
                            <a class="tx-info tx-12 d-block mg-t-10"
                                ><router-link to="/forgot"
                                    >Forgot password?</router-link
                                ></a
                            >
                        </div>
                        <!-- form-group -->
                        <button type="submit" class="btn btn-info btn-block">
                            Sign In
                        </button>

                        <div class="mg-t-60 tx-center">
                            Not yet a member?
                            <a class="tx-info"
                                ><router-link to="/register"
                                    >Sign Up</router-link
                                ></a
                            >
                        </div>
                    </div>
                    <!-- login-wrapper -->
                </div>
                <!-- d-flex -->
            </form>
        </div>
    </div>
</template>
<script>
export default {
    created() {
        if (User.logIn()) {
            this.$router.push({ name: "home" });
        }
    },
    data() {
        return {
            forms: {
                email: "",
                password: ""
            },
            errors: {}
        };
    },
    methods: {
        login() {
            axios
                .post("/api/auth/login", this.forms)
                .then(response => {
                    User.responseAfterLogin(response);
                    Toast.fire({
                        icon: "success",
                        type: "success",
                        title: "Signed in successfully"
                    });
                    this.$router.push({ name: "home" });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    Toast.fire({
                        icon: "error",
                        type: "warning",
                        title: "Email And Password Not Match"
                    });
                });
        }
    }
};
</script>
