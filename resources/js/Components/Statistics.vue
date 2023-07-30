<script setup>
  defineProps(["most_visited", "total"]);
</script>
<template>
    <div class="row Statistics">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body d-flex align-content-center justify-content-center">
                            <div class="content">
                                <div class="title">Link Count</div>
                                <span class="count fw-bold d-flex justify-content-center">{{ total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body d-flex align-content-center justify-content-center">
                            <div class="content">
                                <div class="title d-flex justify-content-center">Link Mosted Visited</div>
                                <span class="link fw-bold d-flex justify-content-center">{{ most_visited }}</span>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</template>