    
<script setup>
    import Statistics from "@/Components/Statistics.vue"
    import Headers from "@/Components/Header.vue"
    import Datatable from "@/Components/Datatable.vue"
    import { Link,Head } from '@inertiajs/vue3'
    const props =defineProps({
        data:Object,
        mostvisited:Object,
    });
    // const props = defineProps([
    //     "data",
    //     "mostvisited",

    // ]);
</script>
<template>
    <Head>
        <title>Home</title>
    </Head>
    <div>
        <Headers title="Home URL Shortener"/>
        <div class="container mt-3">
            <Statistics 
                :total="data.length" 
                :most_visited="mostvisited"
            />
            
            <div class="row tabledata mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row" v-if="$page.props.flash.message">
                            <div class="col-12 text-success">
                                {{ $page.props.flash.message }}
                            </div>
                        </div>
                        <div class="row align-content-center">
                            <div class="col-6">
                                <div class="fw-bold">Table Url Shortener</div>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <Link :href="route('urlshortener.create')" class="btn btn-primary">Add ShortUrl</Link>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <Datatable :dataItem="data"
                        />
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</template>
<style>
    .header{
    border-bottom: 1px solid #c9c2c2;
    }
    .Statistics .card {
    height: 20vh ;
    }
    .Statistics .card , .form .card,.tabledata .card{
        box-shadow: 0px 1px 5px grey;
    } 
    .Statistics .content span{
        padding: 25px 0;
    }
    .Statistics .link{
        color:blue;
    }
    .tabledata  .card-header{
        background: transparent;
    }
</style>