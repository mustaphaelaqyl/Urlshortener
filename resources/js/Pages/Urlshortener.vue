<script setup>
    import { useForm ,router } from '@inertiajs/vue3'
    import Headers from "@/Components/Header.vue"
    import { Link,Head } from '@inertiajs/vue3'
    const props = defineProps([
        "errors",
    ]);
    const form = useForm({
        url: null,
    })
    // const submit = () => form.post("/store", {
    //     onSuccess: () => {
    //         form.reset();
    //     },
    // });
    const submit = () =>
    form.post("/store",  {
        onSuccess: () => {
            form.reset();
        },
    });
</script>
<template>
    <Head>
        <title>Add</title>
    </Head>
    <div>
        <Headers title="Add URL Shortener"/>
        <div class="container">
            <div class="row mt-5 form justify-content-center align-items-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="submit">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="url" class="fw-bold">Create New Short Url</label>
                                        <input id="url" v-model="form.url" class="form-control" placeholder="Enter Your Url" /> 
                                        <div class="text-danger fw-bold" v-if="errors.url">{{ errors.url }}</div>  
                                    </div>
                                    <div class="col-12 d-flex align-content-center justify-content-center">
                                        <button type="submit" class="btn btn-success btn-lg">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>
<style>
.form{
    height: 50vh;
}
.form .card .card-body{
    padding: 50px;
}
</style>