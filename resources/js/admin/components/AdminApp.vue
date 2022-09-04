<template>
    <div>
        <admin-header></admin-header>
        <tool-bar :auth-user="authUser"></tool-bar>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import Header from "./Header";
import ToolBar from "./ToolBar";

export default {
    name: 'AdminApp',
    components: {
        adminHeader: Header,
        toolBar: ToolBar,
    },
    props: {
        authUser: {
            default: null
        }
    },
}
</script>

<style scoped>

</style>
