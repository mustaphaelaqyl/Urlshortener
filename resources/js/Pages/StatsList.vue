<script setup>
import Headers from "@/Components/Header.vue";
import { Link,Head } from '@inertiajs/vue3';

const props = defineProps(["item",'stats','unique_visit']);

</script>
<template>
    <Head>
        <title>{{ item.shortCode }}</title>
    </Head>
    <div>
        <div class="row py-4 mt-2 header">
            <div class="col-12">
                <h2 class="text-center">URL Shortener stats of  {{ item.shortCode }}</h2>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row Statistics">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body d-flex align-content-center justify-content-center">
                            <div class="content">
                                <div class="title">Total Views</div>
                                <span class="count fw-bold d-flex justify-content-center">{{ stats.length }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body d-flex align-content-center justify-content-center">
                            <div class="content">
                                <div class="title"> Unique clicks </div>
                                <span class="count fw-bold d-flex justify-content-center">{{ unique_visit }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-stats mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ViewdAt</th>
                                    <th scope="col">Ip Adress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="stats">
                                        <tr v-for="(item, index) in stats" :key="item.id">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ item.created_at }}</td>
                                            <td>{{ item.visitor }}</td>
                                        </tr>
                                    </template>
                                    <template v-else>
                                        <tr>
                                            <td colspan="3" class="text-center">There is No data To display</td>
                                        </tr>
                                    </template>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
</style>