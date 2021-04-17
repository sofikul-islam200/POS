<template>
    <div>
        <div
            class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v"
        >
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
                <h2 class="text-center">Dokan Name</h2>
                <br />
                <form method="POST">
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter email address"
                        />
                    </div>

                    <button type="submit" class="btn btn-info btn-block">
                        forgot now</button
                    ><br />
                    <div class="tx-center">
                        <router-link to="/">Back to Login </router-link>
                    </div>
                </form>
            </div>
            <!-- login-wrapper -->
        </div>
        <!-- d-flex -->
    </div>
</template>
<script>
export default {
    name: "forgot",
    data() {
        return {};
    }
};
</script>
