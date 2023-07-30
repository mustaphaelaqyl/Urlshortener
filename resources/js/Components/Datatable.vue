
<script setup>
 import { ref } from 'vue';
 import { Link, usePage, router } from "@inertiajs/vue3";

const props = defineProps(['dataItem']);


const redirect = (link, shorted) => {
    router.get(`/${shorted}`);
    window.open(link);
};
</script>
<template>
    <div>
        <b-table striped hover :items="dataItem" :v-bind="dataItem"></b-table>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">LongUrl</th>
                <th scope="col">ShortUrl</th>
                <th scope="col">Views counter</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in dataItem" :key="item.id">
                    <td>{{ index+1 }}</td>
                    <td>
                        <a class="font-medium text-blue-600 hover:underline"
                                    target="_blank"
                                    :href="item.longUrl">{{ item.longUrl.substring(0, 50) + "..." }}
                        </a>
                    </td>
                    <td>
                        <Link
                                    class="font-medium text-blue-600 hover:underline"
                                    :href="item.longUrl"
                                    @click="redirect(item.longUrl, item.shortCode)"
                                >
                                    {{ item.shortCode }}
                                </Link>
                    </td>
                    <td>{{ item.stats_count }}</td>
                    <td>
                        <Link
                            class="font-medium viewStats"
                            :href="`/${item.id}/Statistics`">
                            View Statistics
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style>
.viewStats{
    text-decoration: none;
    color: rgb(108, 108, 216);
}
</style>