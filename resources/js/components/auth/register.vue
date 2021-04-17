<template>
    <div>
        <div
            class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v"
        >
            <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
                <h2 class="text-center">Dokan Name</h2>
                <div class="form-group">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter your username"
                    />
                </div>
                <!-- form-group -->
                <div class="form-group">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="Enter your email"
                    />
                </div>
                <!-- form-group -->
                <div class="form-group">
                    <input
                        type="number"
                        class="form-control"
                        placeholder="Enter your phone"
                    />
                </div>
                <!-- form-group -->
                <div class="form-group">
                    <input
                        type="password"
                        class="form-control"
                        placeholder="Enter your password"
                    />
                </div>
                <!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">
                    Sign Up
                </button>
                <div class="mg-t-40 tx-center">
                    Already have an account?
                    <router-link to="/"> Login </router-link>
                </div>
            </div>
            <!-- login-wrapper -->
        </div>
        <!-- d-flex -->
    </div>
</template>
<script>
export default {
    name: "register",
    data() {
        return {};
    }
};
</script>
